@extends('layout')

@section('title', '| Forgot my Password' )

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-header">Reset Password</div>

                <div class="panel-body">

                    {{Form::open(['url' => 'password/reset', 'method' => "POST"])}}

                    {{Form::hidden('token', $token)}}

                    {{Form::label('email', 'Email Address:')}}
                    {{Form::email('email', $email, ['class' => 'form-control'])}}

                    {{Form::label('password', 'New Password:')}}
                    {{Form::password('password', ['class' =>'form-control'])}}

                    {{ Form::label('password_confirmation', 'Confirm New Password') }}
                    {{ Form::password('password_confirmation', ['class' => 'form-control']) }}

                    {{Form::submit('Reset Password', ['class' => 'btn btn-primary'])}}

                    {{Form::close()}}

                </div>
            </div>
        </div>
    </div>
@endsection