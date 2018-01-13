<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Category;
use App\Comment;
use App\User;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Session;
use Mail;

class PagesController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $admin = Admin::all();

        return view('index', ['posts' => $posts, 'admin' => $admin]);
    }

    public function navBar()
    {
        $admin = Admin::all();

        return view('partials._navBar', ['admin' => $admin]);
    }

    public function postSingle($slug){

        $post = Post::where('slug', '=', $slug)->with('user')->first();


        return view('posts.postSingle', ['post' => $post]);
    }

    public function postList()
    {
        $posts = Post::with('user')->get();

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

    public function adminDashboard(){

        return view('admin.adminDashboard');
    }

    public function userShow($id){

        $user = User::find($id);

        return view('users.userShow', ['user' => $user]);
    }

    public function testIndex()
    {
        $posts = Post::all();
        $admin = Admin::all();
        $categories = Category::with('posts')->get();

        return view('testIndex', ['posts' => $posts, 'admin' => $admin, 'categories' => $categories]);
    }
}
