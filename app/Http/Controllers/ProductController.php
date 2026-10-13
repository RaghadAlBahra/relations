<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(StoreProductRequest $request){
    $product = Product::query()->create($request->validated());
    return response()->json($product, 201);
   }

   public function show($id){
    $product = Product::with('category')->findOrFail($id);
    return response()->json($product, 200);
   }
}
