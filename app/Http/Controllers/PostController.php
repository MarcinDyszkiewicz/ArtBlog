<?php

namespace App\Http\Controllers;

use App\Category;
use App\Tag;
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
        $categories = Category::all();
        $tags = Tag::all();

        return view('posts.postCreate', ['categories'=>$categories, 'tags'=>$tags]);
    }


    public function postStore(Request $request)
    {
        $this->validate($request, array(
           'artist_name' => 'required|max:80',
            'title' => 'required|min:2|max:100',
            'category_id' => 'required|integer',
            'description' => 'required|min:5|max:500'

        ));

        $post = new Post;

        $post->artist_name = $request->artist_name;
        $post->title = $request->title;
        $post->category_id = $request->category_id;
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

        $post->tags()->sync($request->tags, false);

        Session::flash('success','The post was added!');

        return redirect()->route('postSingle', $post->slug);

    }


    public function postShow($id)
    {
        $post = Post::find($id);

        return view('posts.postShow', ['post' => $post]);
    }


    public function postEdit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();
//        $cats = array();
//        foreach ($categories as $category) {
//            $cats[$categories->id] = $category->name;
//        }

        return view('posts.postEdit', ['post' => $post, 'categories'=>$categories, 'tags'=>$tags]);
    }


    public function postUpdate(Request $request, $id)
    {
        $this->validate($request, array(
            'artist_name' => 'required|max:80',
            'title' => 'required|min:2|max:100',
            'category_id' => 'required|integer',
            'description' => 'required|min:5|max:500'

        ));

        $post = Post::find($id);

        $post->artist_name = $request->input('artist_name');
        $post->title = $request->input('title');
        $post->category_id = $request->input('category_id');
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

        if(isset($request->tags)){
        $post->tags()->sync($request->tags);
    } else {
        $post->tags()->sync(array());
    }



        Session::flash('success','The post was edited!');

        return redirect()->route('postSingle', $post->slug);
    }


    public function postDestroy($id)
    {
        $post= Post::find($id);
        $post->tags()->detach();

        $post->delete($id);

        Session::flash('success', "The post was successfully deleted");
        return redirect()->route('index');
    }


}
