@extends('layouts.app')
@section('content')
<h3>NEW PRODUCT</h3>
{!! Form::open(['action'=>['ProductsController@store'] ,'method'=>'post','files' => true]) !!}

   <div class="form-group">
       {{Form::label('category','Category')}}
       {{Form::text('category','',['class'=>'form-control','placeholder'=>'Category'])}}
       </div>  
  <div class="form-group">
        {{Form::label('title','Title')}}
        {{Form::text('title','',['class'=>'form-control','placeholder'=>'Title'])}}
    </div>
    <div class="form-group">
            {{Form::label('price','Price')}}
            {{Form::text('price','',['class'=>'form-control','placeholder'=>'Price'])}}
            </div>  
    <div class="form-group">
            {{Form::label('description','Description')}}
            {{Form::textarea('description','',['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Content'])}}
        </div>
    <div class="form-group">
            {{Form::label('sort_order','Sort Order')}}
            {{Form::text('sort_order','',['class'=>'form-control','placeholder'=>'Sort order'])}}
        </div>
        <div class="form-group" >
            {!! Form::file('images[]',array('class'=>'image','multiple'=>'multiple')) !!}
        </div>
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    
{!! Form::close() !!}
@endsection
