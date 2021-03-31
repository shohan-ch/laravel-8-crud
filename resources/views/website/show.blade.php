@extends('website.layouts.app')
@section('content')


<div class="d-flex justify-content-around text-white p-1 bg-danger mb-3 align-items-center">
    <h5 class="">{{$product->name}}</h5>
    <a href="{{route('product.index')}}" class="btn btn-sm btn-primary">Back</a>
</div>
  <div class="container">
    

    <h6>{{$product->name}}</h6>
    <small>{{$product->price}}</small>
    <p>{{$product->description}}</p>
    <img src="{{ asset('storage/'.$product->image)}}" alt="img" width="400" height="300" class="img-fluid">





  </div>



@endsection