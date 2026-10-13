<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMedicalFileRequest;
use App\Http\Requests\UpdateMedicalFileRequest;
use App\Models\MedicalFile;
use Illuminate\Http\Request;

class MedicalFileController extends Controller
{
    public function store(StoreMedicalFileRequest $request){

    $exist = MedicalFile::where('student_id',$request->student_id)->exists();
    if($exist){
        return response()->json([
            'message'=>" sorry already exist",
        ],422);
    }
        $med = MedicalFile::query()->create($request->validated());
        return response()->json($med, 201);
    }

    public function index(){
        return MedicalFile::all();
    }


     public function show($student_id){
        $med = MedicalFile::with('student')->where('student_id',$student_id)->first();
       if(!$med){
            return response()->json([
                'message'=>"this student don't have a medical file",
            ],404);
        }

        return response()->json($med, 200);

    }


    public function update(UpdateMedicalFileRequest $request,$id){
        $med = MedicalFile::findOrFail($id);
        $med->update($request->validated());
        return response()->json([
            'message'=>"updated successfully",
            'data'=>$med
        ], 200);
    }

}
