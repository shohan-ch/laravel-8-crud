<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{


    public function index()
    {
        $products = Product::latest('id')->get();
        return view('website.index', compact('products'));
    }


    public function create()
    {
        return view('website.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required | max:90 | unique:products',
            'price'       => 'required | numeric',
            'description' => 'required | max:1200',
            'image'       => ['required', 'image', 'max:2048']
        ]);

        $imagepath = $request->image->store('Product_image', 'public');
        Product::create([
            'name'        => $request->name,
            'price'       => $request->price,
            'description' => $request->description,
            'image'       => $imagepath
        ]);
        return redirect(route('product.index'))->with('success', 'Product added succesfpully');
    }


    public function show(Product $product)
    {
        return view('website.show', compact('product'));
    }


    public function edit(Product $product)
    {
        return view('website.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'        => 'required | max:90',
            'price'       => 'required | numeric',
            'description' => 'required | max:1200',
            'image'       => ['image', 'max:2048']
        ]);

        if ($request->hasFile('image')) {
            Storage::delete('public/' . $product->image);
            $imagepath = $request->image->store('Product_image', 'public');
            $product->update([
                'name'        => $request->name,
                'price'       => $request->price,
                'description' => $request->description,
                'image'       => $imagepath
            ]);
        } else {
            $product->update([
                'name'        => $request->name,
                'price'       => $request->price,
                'description' => $request->description,
            ]);
        }
        return redirect(route('product.index'))->with('success', 'Product Updated !');
    }

    public function destroy(Product $product)
    {

        Storage::delete('public/' . $product->image);
        $product->delete();
        return back()->with('success', 'Product deleted !');
    }
}
