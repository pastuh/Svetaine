<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Mews\Purifier\Facades\Purifier;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-posts', ['only' => ['create', 'store']]);
        $this->middleware('permission:delete-posts', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // Atvaizduoju postus jeigu USER turi nors viena.
        $user_posts = Auth::user()->posts->count();
        if (Auth::user()->hasPermission('read-posts') and $user_posts > 0) {
            // Skaiciuoju kiek irasu.
            if ($user_posts <= 4) {
                $posts_number = $user_posts;
            } else {
                $posts_number = 4;
            }

            // Isvedu pirmus postus pagal data
            $posts = Post::where('user_id', '=', Auth::user()->id)->orderBy('id', 'desc')->take($posts_number)->get();

            // Skipinu pirmus postus pagal data ir imu likusius
            $skip = $posts_number;
            $limit = $user_posts - $skip; // the limit
            $old_posts = Post::where('user_id', '=', Auth::user()->id)->orderBy('id', 'desc')->skip($skip)->take($limit)->get();

            return view('posts.index', compact('posts', 'old_posts', 'user_posts'));
        }

        if (Auth::user()->hasPermission('create-posts')) {
            return redirect()->route('posts.create');
        }

        return redirect()->route('blog.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the data
        $this->validate($request, array(
            'title' => 'required|min:16|max:90',
            'slug' => 'required|alpha_dash|min:12|max:90|unique:posts,slug',
            'body' => 'required|min:50',
            'category_id' => 'required|integer|not_in:0',
            'tags' => 'required|array',
            'featured_image' => 'required|image',
            'status_check' => 'sometimes'
        ));

        // Store in database
        $post = new Post;

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->body = Purifier::clean($request->body, 'youtube');
        $post->category_id = $request->category_id;
        $post->user_id = Auth::user()->id;

        //save image
        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = uniqid() . time() . '.' . $image->getClientOriginalExtension();

            // Posto fullscreen IMG ORIGINAL
            $location = public_path('img/posts/') . $filename;
            Image::make($image)->save($location);
            $post->image = $filename;

            // Posto fullscreen IMG BLUR
            $location2 = public_path('img/posts/') . 'b_' . $filename;
            Image::make($image)->blur(11)->save($location2);
            $post->image_blured = 'b_' . $filename;

            // Posto mini THUMB
            $location3 = public_path('img/posts/') . 't_' . $filename;
            Image::make($image)->resize(200, 113)->save($location3);
            $post->image_thumb = 't_' . $filename;

        }

        //save publish status (Jeigu pazymeta, tai grazinti kad true)
        if ($request->status_check == 'true') {
            $post->status = 1;
        }

        $post->save();

        $post->tags()->sync($request->tags, false);

        // Inform about post
        Session::flash('success', 'Įrašas sėkmingai išsaugotas!');

        // Redirect to another page

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        // Tikrinu ar egzistuoja Postas su nurodytu ID
        if ($post) {
            // Rodyti posta tik tam, kam priklauso ir kas turi teises
            if (Auth::user()->canAndOwns('read-posts', $post) or Auth::user()->hasRole('editor|administrator|superadministrator')) {

                // Previous post id
                $previous = Post::where('id', '<', $post->id)->where('user_id', '=', Auth::user()->id)->max('id');
                $previous_post = Post::find($previous);

                // Next post id
                $next = Post::where('id', '>', $post->id)->where('user_id', '=', Auth::user()->id)->min('id');
                $next_post = Post::find($next);

                return view('posts.show', compact('post', 'previous_post', 'next_post'));
            }
        }

        return redirect()->route('error.403');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        if ($post == NULL) {
            return redirect()->route('error.403');
        }

        // Leisti EDIT Jeigu postas NE-Published ir priklauso Useriui, arba kitas Useris su spec Rolem
        if ($post->published == 0 and Auth::user()->canAndOwns('update-posts', $post) or Auth::user()->hasRole('editor|administrator|superadministrator')) {

            $categories = Category::all();
            $tags = Tag::all();

            return view('posts.edit', compact('post', 'categories', 'tags'));
        }

        return redirect()->route('error.403');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Save the data to the database
        $post = Post::find($id);

        if ($post->published == 0 and Auth::user()->canAndOwns('update-posts', $post) or Auth::user()->hasRole('editor|administrator|superadministrator')) {
            // Validate the data
            $this->validate($request, array(
                'title' => 'required|min:16|max:90',
                'slug' => 'required|alpha_dash|min:12|max:90|unique:posts,slug,' . $id,
                'body' => 'required|min:50',
                'category_id' => 'required|integer|not_in:0',
                'tags' => 'required|array',
                'featured_image' => 'sometimes|image',
                'status_check' => 'sometimes',
                'published_check' => 'sometimes'
            ));

            $post->title = $request->input('title');
            $post->slug = $request->input('slug');
            $post->body = Purifier::clean($request->body, 'youtube');
            $post->category_id = $request->input('category_id');

            if ($request->hasFile('featured_image')) {
                // Add new photo
                $image = $request->file('featured_image');
                $filename = uniqid() . time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('img/posts/' . $filename);
                Image::make($image)->save($location);
                $old_filename = $post->image;
                // Update database
                $post->image = $filename;

                // Posto fullscreen IMG BLUR
                $location2 = public_path('img/posts/') . 'b_' . $filename;
                Image::make($image)->blur(10)->save($location2);
                $old_filename2 = $post->image_blured;
                // Update database
                $post->image_blured = 'b_' . $filename;

                // Posto THUMB IMG
                $location3 = public_path('img/posts/') . 't_' . $filename;
                Image::make($image)->resize(200, 113)->save($location3);
                $old_filename3 = $post->image_thumb;
                // Update database
                $post->image_thumb = 't_' . $filename;

                // Delete old photo
                Storage::disk('images')->delete(['posts/' . $old_filename, 'posts/' . $old_filename2, 'posts/' . $old_filename3]);

            }

            if ($request->status_check == 'true') {
                $post->status = 1;
            } else {
                $post->status = 0;
            }

            if ($request->published_check == 'true') {
                $post->published = 1;
            } else {
                $post->published = 0;
            }

            $post->save();

            $post->tags()->sync($request->tags);
            // Set flash data with success message
            Session::flash('success', 'Įrašas sėkmingai išsaugotas!');

            // Redirect with flash data to posts.show
            return redirect()->route('posts.show', $post->id);
        }

        return redirect()->route('error.403');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if ($post->published == 0 and Auth::user()->canAndOwns('delete-posts', $post) or Auth::user()->hasRole('editor|administrator|superadministrator')) {

            // Atjungiu visus Tagus kurie buvo su trinamu Postu
            $post->tags()->detach();
            $filename_old = $post->image;
            $filename_old2 = $post->image_blured;
            $filename_old3 = $post->image_thumb;
            Storage::disk('images')->delete(['posts/' . $filename_old, 'posts/' . $filename_old2, 'posts/' . $filename_old3]);

            $post->delete();

            Session::flash('success', 'Įrašas sėkmingai sunaikintas!');

            return redirect()->route('posts.index');
        }

        Session::flash('status', 'Neturite leidimo naikinti publikuotą įrašą');
        return redirect()->route('posts.show', $post->id);
    }
}
