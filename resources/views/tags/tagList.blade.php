@extends('layout')

@section('title', '| All Tags')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Categories</h1>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                </tr>

                </thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <td>{{$tag->id}}</td>
                        <td>{{$tag->name}}</td>

                        @endforeach
                    </tr>
                </tbody>
            </table>

        </div>
    </div>



@endsection