@extends('layout')

@section('title', "| $post->artist_name")

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
                <th>Category</th>
                <th>Tags</th>
                <th>Created At</th>


                </thead>
                <tbody>
                <tr>
                    <td>{{$post->artist_name}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->category->name}}</td>
                    <td>{{$post->description}}</td>
                    <td>{{$post->img}}</td>
                    <td>{{$post->category->name}}</td>
                    @foreach($post->tags as $tag)<td> <span class="label label-default">{{$tag->name}}</span></td>@endforeach
                    <td>{{$post->created_at}}</td>



                </tr>
                </tbody>
            </table>

        </div>
    </div>



@endsection