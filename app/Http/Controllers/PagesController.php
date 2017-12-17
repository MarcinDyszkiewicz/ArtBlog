<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Session;

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


}
