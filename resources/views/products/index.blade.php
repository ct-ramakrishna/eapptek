@extends('layouts.app')
@section('content')

<div class="table-responsive-sm">
<table class="table table-striped">
    <tr>
        <th>S.no</th>
        <th>Category</th>
        <th>Title</th>
        <th>Description</th>
        <th>Price</th>
       
        <th>Date</th>
        <th>Action</th>
    </tr>
    @if(count($products)>0)
    <?php $j = 1; ?>
    @foreach($products as $product)
   
    <tr>
            <td>{!! $j++ !!}</td>
            <td>{{$product->category}}</td>
            <td>{{$product->title}}</td>
            <td>{!! substr($product->description,0,20)!!}</td>
            <td>{{$product->price}}</td>

    

            <td>{{$product->created_at}}</td>
    <td><a href="/products/{{$product->id}}/edit" class="btn btn-primary action_btn" >Update</a>
        {!! Form::open(['action'=>['ProductsController@destroy',$product->id],'method'=>'post','class'=>'action_btn','enctype' => 'multipart/form-data']) !!}
        {{ Form::hidden('_method','DELETE') }}
        {{ Form::submit('Delete',['class'=>'btn btn-danger']) }}
        {!! Form::close() !!}
        </td>
        </tr>
        @endforeach
        @endif
</table>
</div>
<a href='/products/create' class="btn btn-primary" >Add new</a>
{{$products->links()}}
@endsection
