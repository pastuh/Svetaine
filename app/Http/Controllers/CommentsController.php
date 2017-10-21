<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use LukeTowers\Purifier\Facades\Purifier;

class CommentsController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $post_id)
    {
        // Surandu su kuo asocijuoti belongsTo
        $post = Post::find($post_id);

        if (Auth::user()->can('create-comments')) {

            $this->validate($request, array(
                'comment' => 'required|min:5|max:2000'
            ));

            if (Auth::user()->comments->count() > 0 and !Auth::user()->hasRole('administrator|superadministrator')) {
                // Jeigu useris yra parases komentara, tai neleisti rasyti kito 60 sekundziu.
                $comment_time = 60 - (abs(time() - Auth::user()->comments->last()->created_at->timestamp));
                if ($comment_time > 0) {
                    Session::flash('status', 'Komentuoti galima viena kartą per minutę');
                    return Redirect::back()->withInput(Input::all());
                }
            }

            $comment = new Comment();
            $comment->comment = Purifier::clean($request->comment);
            $comment->approved = true;
            $comment->user_id = $request->user()->id;

            // Sujungiu kam priklauso komentaras
            $comment->post()->associate($post);
            $comment->save();

            Session::flash('success', 'Komentaras sėkmingai išsaugotas!');

            // Siunciu info, kad butu rodomi komentarai
            return redirect()->route('blog.slug', $post->slug);
        }

        Session::flash('status', 'Neturite leidimo komentuoti');
        return redirect()->route('blog.slug', $post->slug);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);
        if ($comment == NULL) {
            return redirect()->route('error.403');
        }

        if (Auth::user()->canAndOwns('update-comments', $comment) and (abs(time() - strtotime($comment->created_at)) < 300) or Auth::user()->hasRole('editor|administrator|superadministrator')) {

            // Jeigu useris yra parases komentara, tai neleisti rasyti kito 60 sekundziu.
            return view('comments.edit', compact('comment'));
        }
        return redirect()->route('blog.slug', $comment->post->slug);
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
        $comment = Comment::find($id);

        if (Auth::user()->canAndOwns('update-comments', $comment) or Auth::user()->hasRole('editor|administrator|superadministrator')) {
            $this->validate($request, array(
                'comment' => 'required|min:5|max:2000'
            ));

            $comment->comment = Purifier::clean($request->comment);
            $comment->save();

            Session::flash('success', 'Komentaras sėkmingai išsaugotas');
            return redirect()->route('blog.slug', $comment->post->slug);
        }

        Session::flash('status', 'Neturite leidimo atnaujinti komentaro');
        return redirect()->route('blog.slug', $comment->post->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);

        if (Auth::user()->canAndOwns('delete-comments', $comment) and (abs(time() - strtotime($comment->created_at)) < 300) or Auth::user()->hasRole('editor|administrator|superadministrator')) {
            $post_slug = $comment->post->slug;
            $comment->delete();

            Session::flash('success', 'Komentaras sėkmingai ištrintas');
            /*Papildomai informuoju per sesija, kad komentaras sekmingai panaikintas*/
            return redirect()->route('blog.slug', $post_slug)->with('deleted-comment', true);

        }
        Session::flash('status', 'Neturite leidimo naikinti komentarą');
        return redirect()->route('blog.slug', $comment->post->slug);

    }
}
