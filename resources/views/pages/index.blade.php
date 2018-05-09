@extends('layouts.app')
@section('content')
<div class="jombotron text-center">
    <h1>welcome to laravel</h1>
    <p> welcome to home page {{ $title }}</p>
    <a class="btn btn-primary btn-lg" href="/login">Login</a>
    <a class="btn btn-success btn-lg" href="/register">Register</a>
</div>
   
 @endsection

