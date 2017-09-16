<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function getIndex () {
        // Skaiciuoju kiek PUBLISHED irasu
        $count = Post::where('published', '1')->count();

        // Kiek puslapyje atvaizduos naujienu
        if ($count < 1){

            // Tikrinu ar useris prisijunges
            if(Auth::check()){
            // Jeigu prisijunges kiek IS VISO irasu turi sukures lankytojas
                $check = Auth::user()->posts->count();
            // Tikrinu ar turi nors viena posta, jeigu turi tai eiti i POSTS
                if($check >= 1) {
                    return redirect()->route('posts.index');
                }
            // Jeigu neturi nei vieno posto, bet turi teises kurti postus, eiti i Create POSTS
                if(Auth::user()->hasPermission('create-posts')){
                    return redirect()->route('posts.create');
                }
            }
            // Jeigu neturi jokiu irasu ir leidimo kurti postus, tai eiti i profili
            return redirect()->route('profile');

        } elseif($count <= 4) {
            $posts_number = $count;
        }else {
            $posts_number = 4;
        }

        // Isvedu pirmus postus pagal data
        $posts = Post::orderBy('id', 'desc')->where('published', '1')->take($posts_number)->get();

        // Skipinu pirmus postus pagal data ir imu likusius
        $skip = $posts_number;
        $limit = $count - $skip; // the limit
        $old_posts = Post::orderBy('id', 'desc')->skip($skip)->take($limit)->where('published', '1')->get();

        return view('blog.index', compact('posts', 'old_posts', 'count'));
    }

    public function getSingle ($slug) {
        // fetch from the DB based on slug
        $post = Post::where('slug', '=', $slug)->first();

        if($post === null || $post->published == 0) {
            return redirect()->to('blog');
        }

        // Previous post id
        $previous = Post::where('id', '<', $post->id)->where('published', '1')->max('id');
        $previous_post = Post::find($previous);

        // Next post id
        $next = Post::where('id', '>', $post->id)->where('published', '1')->min('id');
        $next_post = Post::find($next);

        /* Surandu komentarus kurie priklauso siam postui ir paverciu i puslapiavima */
        $comments = Comment::where('post_id', '=', $post->id)->where('approved', '1')->orderBy('id', 'desc')->paginate(5);
        $links = $comments->links();

        // Jeigu useris yra parases komentara, tai neleisti rasyti kito 60 sekundziu.
        if(Auth::check() and Auth::user()->comments->count() > 0){
            $comment_time = 60 - (abs(time() - Auth::user()->comments->last()->created_at->timestamp));
            if($comment_time <= 0){
                $comment_time = 0;
            }
        } else {
            $comment_time = 0;
        }

        // return the view and pass in the post object
        return view('blog.show', compact('post', 'comments', 'previous_post', 'next_post', 'comment_time', 'links'));
    }
}
