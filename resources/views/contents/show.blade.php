@extends('layouts.app')
@section('content')

<h3>{{$content->title}}</h3>
<p>Written on {{$content->created_at}}</p>
<div>
   {!! $content->content !!}
</div>
<a href="/contents" class="btn btn-primary">Go back</a> <a class="btn btn-primary" href='/contents/{{$content->id}}/edit' >Update</a>
{!! Form::open(['action'=>['ContentController@destroy',$content->id],'method'=>'post','class'=>'float-right'])!!}
{{ Form::hidden('_method','DELETE')}}
{{ Form::submit('Delete',['class'=>'btn btn-danger'])}}
{!! Form::close() !!}
@endsection