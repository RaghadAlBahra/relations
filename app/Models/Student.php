<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
#[Fillable(['name'])]
class Student extends Model
{
   public function medical_file(){
    return $this->hasOne(MedicalFile::class);
   }
}
