@extends('website.layouts.app')
@section('content')
<div class="d-flex justify-content-around text-white p-1 bg-danger mb-4 align-items-center">
    <h5>Edit Product</h5>
    <a href="{{route('product.index')}}" class="btn btn-primary btn-sm">Cancel</a>
</div>
<div class="container">

    <div class="card card-primary p-5">
        <!-- /.card-header -->
        <!-- form start -->
        <form action='{{route('product.update',$product)}}' role="form" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            
            <div class="form-group">
              <label for="exampleInputEmail1">Name</label>
            <input type="text" name="name" class="form-control  {{$errors->has('name') ? 'border-danger' : ''}}" id="exampleInputEmail1" placeholder="Enter name"  value="{{$product->name}}">
              @error('name')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Price</label>
              <input type="text" name="price" class="form-control {{$errors->has('price') ? 'border-danger' : ''}}" id="exampleInputPassword1" placeholder="Price"  value="{{$product->price}}">
              @error('price')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Description</label>
                <input type="text" name="description" class="form-control {{$errors->has('description') ? 'border-danger' : ''}}" id="exampleInputPassword1" placeholder="Description"  value="{{$product->description}}">
                @error('description')
              <span class="text-danger">{{$message}}</span>
              @enderror

              </div>

            <div class="form-group">
              <label for="exampleInputFile">File input</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" name="image" class="custom-file-input {{$errors->has('file') ? 'border border-danger' : ''}}" id="exampleInputFile">
                  <p>
                  @error('image')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </p>
                </div>
              </div>
              <img src="{{ asset('storage/'.$product->image)}}" alt="img" width="400" height="300" class="img-fluid">
            </div>
          
          <!-- /.card-body -->
            <button type="submit" class="btn btn-primary mt-3">Update</button>
          
        </form>
      </div>

  


</div>


@endsection