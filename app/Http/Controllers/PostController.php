<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postCreate()
    {
        return view('posts.postCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postShow($id)
    {
        $post = Post::find($id);

        return view('posts.postShow', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postEdit($id)
    {
        $post = Post::find($id);

        return view('posts.postEdit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function postDestroy($id)
    {
        $post= Post::find($id);
//        $post->tags()->detach();

        $post->delete($id);

        Session::flash('success', "The post was successfully deleted");
        return redirect()->route('index');
    }

    public function postSingle($slug){

        $post = Post::where('slug', '=', $slug)->first();

        return view('posts.postSingle', ['post' => $post]);
    }
}
