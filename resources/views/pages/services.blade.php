@extends('layouts.app')
@section('content')
      welcome to services page
      @if(count($services)>0)
      <p>
          @foreach($services as $service)
              <ul>
                  {{$service}}
              </ul>
          
          @endforeach
      </p>
      @endif
      @endsection