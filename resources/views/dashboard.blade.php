@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active" href="#contents" role="tab" data-toggle="tab">Contents</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#buzz" role="tab" data-toggle="tab">Products</a>
                            </li>
                          
                          </ul>
                          
                          <!-- Tab panes -->
                          <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active show" id="contents">
                                    @if(count($mycontents)>0)
                                    @foreach($mycontents as $content)
                                 <p><h5>{{$content->title}}</h5>
                                    {!! $content->content !!}</p>
                                    <hr>
                                    @endforeach
                                @endif
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="buzz">
                                    @if(count($myproducts)>0)
                                    @foreach($myproducts as $product)
                                 <p><h5>{{$product->title}}</h5>
                                    Category : {!! $product->category !!}<br>
                                    Created on : {!! $product->created_at !!} | By : {!! auth()->user()->name !!} 
                            
                                </p>
                                    <hr>
                                    @endforeach
                                @endif
                            </div>
                            
                          </div>
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
