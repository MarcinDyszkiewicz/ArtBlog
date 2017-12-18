@extends('layout')

@section('title', "| $tag->id Tag")

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <table class="table table-hover" width="100%">
                <thead>
                <th>Tag Name</th>
                <th>Number of Posts</th>
                <th></th>
                <th></th>

                </thead>


                <tbody>
                <tr>
                    <td>{{$tag->name}}</td>
                    <td>{{$tag->posts()->count()}}</td>
                    <td><a href="{{route('tagEdit', $tag->id)}}" class="btn btn-primary btn-block">Edit</a></td>
                    <td>{{ Form::open(array('route' => ['tagDestroy', $tag->id], 'method' => 'DELETE'))}}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) }}
                        {{Form::close()}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <table class="table table-hover" width="100%">
                <thead>
                    <th>Artist Name</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Tags</th>

                    <th></th>
                </thead>

                <tbody>
                @foreach($tag->posts as $post)
                <tr>
                    <td><a href="{{url('post/'.$post->slug)}}">{{$post->artist_name}}</a></td>
                    <td><a href="{{url('post/'.$post->slug)}}">{{$post->title}}</a></td>
                    <td>{{$post->img}}</td>
                    <td>@foreach($post->tags as $tag)<span class="label label-default"> {{$tag->name}} </span>
                        @endforeach</td>

                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>



@endsection