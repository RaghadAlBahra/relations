<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   public function store(StoreCategoryRequest $request){
    $cat = Category::query()->create($request->validated());
    return response()->json($cat, 201);
   }

   public function index(){
    return Category::all();
   }

   public function show($category_id){
    $cat = Category::with('products')->findOrFail($category_id);
    return response()->json($cat, 200);
   }

    public function destroy($id)
    {
        $cat = Category::findOrFail($id);
        if(!$cat){
            return response()->json([
                'message'=>"category not found"
            ], 404);
        }

        if($cat->products()->count()>0){
            return response()->json([
                'message'=>"can't delete this category because it has products"
            ],422);
        }
        $cat->delete();
        return response()->json([
            'message'=>"deleted successfully"
        ],200);
    }
}
