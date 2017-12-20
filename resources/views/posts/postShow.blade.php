@extends('layout')

@section('title', '| Show Post', "$post->id")

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <table class="table table-hover" width="100%">
                <thead>
                <th>Artist Name</th>
                <th>Title</th>
                <th>Category</th>
                <th>Description</th>
                <th>Image</th>
                <th>Created At</th>
                <th>Url</th>
                <th></th>


                </thead>
                    <tbody>
                    <tr>
                        <td>{{$post->artist_name}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->category->name}}</td>
                        <td>{!!$post->description!!}</td>
                        <td><img src="{{asset('/images/' . $post->img)}}"/></td>
                        <td>{{$post->created_at}}</td>
                        <td><a href="{{url('post/'.$post->slug)}}">{{url('post/'.$post->slug)}}</a> </td>
                        <td>{{ Form::open(array('route' => ['postDestroy', $post->id], 'method' => 'DELETE'))}}
                            {{Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) }}

                            {{Form::close()}}</td>



                    </tr>
                    </tbody>
            </table>

        </div>
    </div>

    <div class="row">
        <div id="comment-form" class="col-md-8 col-md-offset-2">
            <p>Comments: ({{$post->comments->count()}})</p>
            @foreach($post->comments as $comment)
                <div class="comment">
                    <p>{{$comment->comment_body}}</p>
                    <p><a href="{{route('commentEdit', $comment->id)}}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span>  </a>
                       <a href="{{route('commentDelete', $comment->id)}}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span>  </a></p>


                    @endforeach

                </div>
        </div>
    </div>

@endsection