<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Session;
use Mail;

class PagesController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('index', ['posts' => $posts]);
    }

    public function postSingle($slug){

        $post = Post::where('slug', '=', $slug)->first();

        return view('posts.postSingle', ['post' => $post]);
    }

    public function postList()
    {
        $posts = Post::all();

        return view('postList', ['posts' => $posts]);
    }

    public function contactPage(){

        return view('contact');
    }

    public function contactPost(Request $request) {

        $this->validate($request, [
            'name' => 'min:2',
            'email' => 'required|email',
            'subject' => 'min:3',
            'message' => 'min:10'
        ]);

        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
        );

        Mail::send('emails.contactMessage', $data, function ($message) use($data){
            $message->from($data['email']);
            $message->to('marcin.dyszkiewicz@gmail.com');
            $message->subject($data['subject']);
        });

        Session::flash('success', 'Thank You. Your Email was Sent');
        return redirect()->route('contactPage');
    }
}
