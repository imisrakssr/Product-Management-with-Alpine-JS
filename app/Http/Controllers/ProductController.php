<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Middleware\RequirePassword;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    function practice(Request $request){
        $products = Product::all();
        return view ('alpine.practice', ['products'=>$products]);
    }
    function form(Request $request){
        $products = Product::all();
        return view ('alpine.products', ['products'=>$products]);
    }
    function index(Request $request){
        $products = Product::all();
        return response()->json($products);
    }
    function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);
        $product = Product::create($validated);
        return response()->json(['message'=> 'Product created successfully!', 'product' => $product,]);
    }

    function update(Request $request, $id){
        $product = Product::find($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);
        $product->update($validated);
        return response()->json(['message'=> 'Product updated successfully!', 'product' => $product,]);
    }

    function destroy(Request $request, $id){
        $product = Product::find($id);
        $product -> delete();
        return response()->json(['message'=> 'Product deleted successfully!']);
    }
}
