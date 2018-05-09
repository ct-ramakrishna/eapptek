@extends('layouts.app')
@section('content')
<h3>NEW PRODUCT</h3>
{!! Form::open(['action'=>['ProductsController@update',$product->id] ,'method'=>'post','files' => true]) !!}

   <div class="form-group">
       {{Form::label('category','Category')}}
       {{Form::text('category',$product->category,['class'=>'form-control','placeholder'=>'Category'])}}
       </div>  
  <div class="form-group">
        {{Form::label('title','Title')}}
        {{Form::text('title',$product->title,['class'=>'form-control','placeholder'=>'Title'])}}
    </div>
    <div class="form-group">
            {{Form::label('price','Price')}}
            {{Form::text('price',$product->price,['class'=>'form-control','placeholder'=>'Price'])}}
            </div>  
    <div class="form-group">
            {{Form::label('description','Description')}}
            {{Form::textarea('description',$product->description,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Content'])}}
        </div>
    <div class="form-group">
            {{Form::label('sort_order','Sort Order')}}
            {{Form::text('sort_order',$product->sort_order,['class'=>'form-control','placeholder'=>'Sort order'])}}
        </div>
        {!! Form::file('images[]', array('class' => 'image','multiple'=>'multiple')) !!}
        <p>
             @php 
             $images=array_filter(explode("|",$product->images));
             @endphp  
                @if(count($images)>0)
                 
                    @foreach(explode("|",$product->images) as $img)
                        <img src='/storage/product_images/{{$img}}' width="25" height="25">
                    @endforeach
                @endif
        </p>
        <a href='/products' class="btn btn-primary">Go back</a>
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}} 
        {{Form::hidden('_method','put')}}
{!! Form::close() !!}

@endsection
