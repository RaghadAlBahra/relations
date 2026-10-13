<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MedicalFileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

route::post('student',[StudentController::class,'store']);
route::get('student',[StudentController::class,'index']);
route::get('student/{id}',[StudentController::class,'show']);

route::post('medF',[MedicalFileController::class,'store']);
route::get('medF/{id}',[MedicalFileController::class,'show']);
route::get('medF',[MedicalFileController::class,'index']);
route::put('medF/{id}',[MedicalFileController::class,'update']);


route::post('cat',[CategoryController::class,'store']);
route::get('cat/{id}',[CategoryController::class,'show']);
route::get('cat',[CategoryController::class,'index']);
route::delete('cat/{id}',[CategoryController::class,'destroy']);


route::post('product',[ProductController::class,'store']);
route::get('product/{id}',[ProductController::class,'show']);
route::delete('cat/{id}',[CategoryController::class,'destroy']);
