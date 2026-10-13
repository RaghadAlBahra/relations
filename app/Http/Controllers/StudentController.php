<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function store(StoreStudentRequest $request){
        $student = Student::query()->create($request->validated());
        return response()->json($student, 201);
    }

    public function index(){
        return Student::all();
    }

    public function show($id){
        $student = Student::with('medical_file')->findOrFail($id);
        return response()->json($student, 200);
    }
}
