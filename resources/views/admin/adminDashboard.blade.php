@extends('layout')

@section('title', '| Dashboard')

@section('content')

<p>{{ Auth::guard('admin') ? "Logged as Admin" : ""}}</p>


    @endsection