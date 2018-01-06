<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class PagesController extends Controller
{
    // Isveda Welcome puslapi
    public function getIndex () {

        $post_count = Post::where('published', '1')->count();
        if($post_count == 0 ) {
            if(Auth::check()){
                return view('pages.profile');
            }
            return view('auth.login');
        } elseif($post_count <= 4 ){
            $post_number = $post_count;
        } else {
            $post_number = 4;
        }
        $posts = Post::orderBy('id', 'desc')->where('published', '1')->take($post_number)->get();

        return view('pages.welcome', compact('posts'));
    }

    public function getError() {
        return view('errors.403');
    }

    public function getContact() {
        return view('pages.contact');
    }

    public function postContact(Request $request) {

        $this->validate($request, array(
            'g-recaptcha-response' => 'required|captcha',
            'email'     =>  'required|email|min:8|max:100',
            'subject'   =>  'required|min:8|max:255',
            'message'   =>  'required|min:20'
        ));

        $data = array(
            'email'     => $request->email,
            'subject'   => $request->subject,
            'bodyMessage'   => $request->message
        );

        Mail::send('emails.contact', $data, function ($message) use($data) {
            $message->from($data['email']);
            $message->to('info@thehunter.lt');
            $message->subject('theHunter.LT laiškas');
        });

        Session::flash('success', 'Žinutė sėkmingai išsiūsta!');

        return redirect()->route('profile');
    }
}
