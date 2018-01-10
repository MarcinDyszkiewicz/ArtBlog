@extends('layout')

@section('title', '| Forgot my Password' )

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-header">Admin Reset Password</div>

                    <div class="panel-body">

                        @if (session('status'))
                            <div class="alert alert-success">
                                    {{session('status')}}
                            </div>
                        @endif
                        {{Form::open(['url' => 'admin/password/email', 'method' => "POST"])}}

                        {{Form::label('email', 'Email Address:')}}
                        {{Form::email('email', null, ['class' => 'form-control'])}}

                        {{Form::submit('Reset Password', ['class' => 'btn btn-primary'])}}

                        {{Form::close()}}

                    </div>
            </div>
        </div>
    </div>
@endsection