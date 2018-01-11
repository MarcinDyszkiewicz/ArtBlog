@extends('layout')

@section('title', "| User $user->name")

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <table class="table table-hover" width="100%">
                <thead>
                <th>User Name</th>
                <th>Posts</th>
                <th>Comments</th>
                <th>Replies for Comments</th>
                <th>Created At</th>

                </thead>
                <tbody>
                <tr>
                    <td>{{$user->name}}</td>
                    <td>@foreach($user->posts as $post){{$post->title}}</td>@endforeach
                    <td>@foreach($user->comments as $comment){{$comment->comment_body}}</td>@endforeach
                    <td>@foreach($user->commentReplies as $commentReply){{$commentReply->comment_reply_body}}</td>@endforeach
                    <td>{{$user->created_at}}</td>

                </tr>
                </tbody>

            </table>
        </div>
    </div>
@endsection