@extends('layout')

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
                    <td>{{$post->title}}</td>


                </tr>
                </tbody>
                        @endforeach
            </table>

        </div>
    </div>



@endsection