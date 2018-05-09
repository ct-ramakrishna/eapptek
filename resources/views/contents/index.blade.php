@extends('layouts.app')
@section('content')

    @if(count($contents)>0)
    <div>
        @foreach($contents as $content)
        <div class="well">
        <h5><a href="/contents/{{$content->id}}">{{$content->title}}</a></h5>
        <small>{!! $content->content !!}</small>
        </div>
        <hr>
        @endforeach
        {{$contents->links()}}
        <a href='/contents/create' class="btn btn-primary">Create New</a>
    </div>
    @else
    <p>No contents are available</p>
    @endif

 @endsection

