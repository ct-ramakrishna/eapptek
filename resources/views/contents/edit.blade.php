@extends('layouts.app')
@section('content')
<h3>NEW CONTENT</h3>
{!! Form::open(['action'=>['ContentController@update',$content->id] ,'method'=>'post']) !!}

    <div class="form-group">
        {{Form::label('title','Title')}}
        {{Form::text('title',$content->title,['class'=>'form-control','placeholder'=>'Title'])}}
    </div>
    <div class="form-group">
            {{Form::label('content','Content')}}
            {{Form::textarea('content',$content->content,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Content'])}}
        </div>
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
        {{Form::hidden('_method','put')}}
{!! Form::close() !!}
@endsection

        
