@extends('website.layouts.app')
@section('content')




<div class="text-white p-1 bg-danger mb-4 align-items-center">
    <div class="container d-flex justify-content-between">
        <h5 class="">Product List</h5>
        <a href="{{route('product.create')}}" class="btn btn-sm btn-primary">Add Product</a>
    </div>
</div>
<div class="container">
    <table class="table table-striped table-bordered ">
        @if (Session('success'))
        <p class="bg-secondary text-white p-1"> {{Session('success')}}</p>
        @endif
        <thead>
            <tr>
                <th>Serial</th>
                <th>name</th>
                <th>Price</th>
                <th width='35%'>Description</th>
                <th>Images</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php
            $i=0
            @endphp
            @foreach ($products as $item)
            @php
            $i++
            @endphp
            <tr>
                <td>{{$i}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->price}}</td>
                <td>{{Str::words($item->description, 40, '...')}}</td>
                <td> <img src="{{asset('storage/'.$item->image)}}" alt="img" width="80" height="80" class="rounded">
                </td>
                <td class="d-flex">
                    <a href="{{ route('product.show',$item)}}" class="btn btn-sm btn-info">Show</a> ||
                    <a href="{{route('product.edit',$item)}}" class="btn btn-sm btn-primary">Edit </a> ||
                    <form action="{{route('product.destroy',$item)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"
                            onclick="return confirm('Are you sure to delete!')">Delete</button>
                    </form>
                </td>
            </tr>



            @endforeach

        </tbody>
    </table>
</div>



@endsection
