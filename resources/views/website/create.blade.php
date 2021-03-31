@extends('website.layouts.app')
@section('content')
<div class="d-flex justify-content-around text-white p-1 bg-danger mb-4 align-items-center">
    <h5>Add Product</h5>
    <a href="{{route('product.index')}}" class="btn btn-primary btn-sm">Back</a>
</div>
<div class="container">

    <div class="card card-primary p-5">
        <!-- /.card-header -->
        <!-- form start -->
        <form action='{{route("product.store")}}' role="form" method="POST" enctype="multipart/form-data" >
            @csrf
            
            <div class="form-group">
              <label for="exampleInputEmail1">Name</label>
            <input type="text" name="name" class="form-control @error('name') border-danger @enderror" id="exampleInputEmail1" placeholder="Enter name"  value="{{old('name')}}">
              @error('name')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Price</label>
              <input type="text" name="price" class="form-control @error('price') border-danger @enderror" id="exampleInputPassword1" placeholder="Price"  value="{{old('price')}}">
              @error('price')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Description</label>
                <input type="text" name="description" class="form-control @error('description') border-danger @enderror" id="exampleInputPassword1" placeholder="Description"  value="{{old('description')}}">
                @error('description')
              <span class="text-danger">{{$message}}</span>
              @enderror

              </div>


            <div class="form-group">
              <label for="exampleInputFile">File input</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" name="image" class="custom-file-input @error('image') border border-danger @enderror" id="exampleInputFile">
                  <p>
                  @error('image')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </p>
                </div>
              </div>
            </div>
          
          <!-- /.card-body -->
            <button type="submit" class="btn btn-primary mt-3">Add</button>
          
        </form>
      </div>

  


</div>


@endsection