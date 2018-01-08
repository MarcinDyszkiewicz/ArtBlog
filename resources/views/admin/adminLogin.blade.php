@extends('layout')

@section('title', '| Admin Login')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            {{ Form::open(array('route' => 'adminLoginSubmit')) }}

            <div class="form-group">

                {{ Form::label('email', 'Admin Email:') }}
                {{ Form::email('email', null, ['class' => 'form-control']) }}

                {{ Form::label('password', 'Admin Password:') }}
                {{ Form::password('password', ['class' => 'form-control']) }}

                <br>
                {{ Form::checkbox('remember')}} {{ Form::label('remember', 'Remember Me')}}
                <br>
                {{ Form::submit('Login as Admin', ['class' => 'btn btn-primary']) }}

                <p><a href="{{ url('admin/password/reset') }}">Forgot My Password</a> </p>
                <br>
                {{ Form::close() }}
            </div>
        </div>
    </div>


@endsection