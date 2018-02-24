<?php

namespace App\Http\Controllers;

use App\Comment;
use App\CommentReply;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(['auth' || 'auth:admin']);
    }

    public function commentStore(Request $request, $post_id)
    {
        $this->validate($request, array(
            'comment_body' => 'required|max:200'
        ));

        $post = Post::find($post_id);

        $comment = new Comment;
        $comment->comment_body = $request->comment_body;
        $comment->user_id = auth()->id();
        $comment->post()->associate($post);

        $comment->save();


        Session::flash('success','Comment was added!');

        return redirect()->route('postSingle', $post->slug);
    }

    public function commentShow($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function commentEdit($id)
    {
        $comment = Comment::find($id);

        return view('comments.commentEdit', ['comment'=>$comment]);
    }

    public function commentUpdate(Request $request, $id)
    {
        //
    }


    public function commentDelete($id)
    {
        $comment = Comment::find($id);

        return view('comments.commentDelete', ['comment'=>$comment]);
    }


    public function commentDestroy($id)
    {
        $comment = Comment::find($id);
        $post_id = $comment->post_id;
        $comment->delete();

        Session::flash('success', 'Comment was deleted');

        return redirect()->route('postShow', $post_id);
    }

    public function commentReplyStore(Request $request, $comment_id)
    {
//        $this->middleware(['user','admin']);

        $this->validate($request, array(
            'comment_reply_body' => 'required|max:200'
        ));

//        $post = Post::find($post_id);
        $comment = Comment::find($comment_id);

        $commentReply = new CommentReply;
        $commentReply->comment_reply_body = $request->comment_reply_body;
        $commentReply->user_id = auth()->id();
        $commentReply->comment()->associate($comment);

        $commentReply->save();


        Session::flash('success','Comment was added!');

        return redirect()->back();
    }


    public function commentAjaxIndex(Post $post)
    {

        return response()->json($post->comments()->with('user')->latest()->get());
    }

    public function commentAjaxStore(Request $request, Post $post)
    {

        $this->validate($request, array(
            'comment_body' => 'required|max:200'
        ));

        $comment = $post->comments()->create([
            'comment_body' => $request->body,
            'user_id' => Auth::id()
        ]);

        $comment = Comment::where('id', $comment->id)->with('user')->first();

        return $comment->toJson();
    }

}
