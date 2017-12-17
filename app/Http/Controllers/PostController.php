<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{


        //Middleware
        public function __construct()
        {
            $this->middleware('auth');
        }


    //CRUD
    public function postCreate()
    {
        return view('posts.postCreate');
    }


    public function postStore(Request $request)
    {
        $this->validate($request, array(
           'artist_name' => 'required|max:80',
            'title' => 'required|min:2|max:100',
            'description' => 'required|min:5|max:500'

        ));

        $post = new Post;

        $post->artist_name = $request->artist_name;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->id_user=0;
        $post->slug = $post->artist_name . time() . '_' . $string = str_random(6);

        if($request->hasFile('img')) {
            $img = $request->file('img');
            $filename = $post->artist_name . time() . '_'. $string = str_random(8) . '.' . $img->getClientOriginalExtension();
            $location = public_path('/images/' . $filename);
            Image::make($img)->save($location);

            $post->img = $filename;
        }

        $post->save();

        Session::flash('success','The post was added!');

        return redirect()->route('postCreate');

    }


    public function postShow($id)
    {
        $post = Post::find($id);

        return view('posts.postShow', ['post' => $post]);
    }


    public function postEdit($id)
    {
        $post = Post::find($id);

        return view('posts.postEdit', ['post' => $post]);
    }


    public function postUpdate(Request $request, $id)
    {
        $this->validate($request, array(
            'artist_name' => 'required|max:80',
            'title' => 'required|min:2|max:100',
            'description' => 'required|min:5|max:500'

        ));

        $post = Post::find($id);

        $post->artist_name = $request->input('artist_name');
        $post->title = $request->input('title');
        $post->description = $request->input('description');
//        $post->id_user=0;

        if($request->hasFile('img')) {
            $img = $request->file('img');
            $filename = $post->artist_name . time() . '_'. $string = str_random(8) . '.' . $img->getClientOriginalExtension();
            $location = public_path('/images/' . $filename);
            Image::make($img)->save($location);

            $post->img = $filename;
        }

        $post->save();

        Session::flash('success','The post was edited!');

        return redirect()->route('postSingle', $post->id);
    }


    public function postDestroy($id)
    {
        $post= Post::find($id);
//        $post->tags()->detach();

        $post->delete($id);

        Session::flash('success', "The post was successfully deleted");
        return redirect()->route('index');
    }


}
