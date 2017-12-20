@extends('layout')

@section('title', '| Homepage')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <table class="table table-hover" width="100%">
                <thead>
                <th>Title</th>


                </thead>
                    @foreach($posts as $post)
                <tbody>
                <tr>
                    <td><a href="{{url('post/'.$post->slug)}}">{{$post->title}}</a></td>
                    <td>{!!str_limit(strip_tags($post->description), $limit = 50, $end = '...')!!}</td>


                </tr>
                </tbody>
                        @endforeach
            </table>

        </div>
    </div>



@endsection