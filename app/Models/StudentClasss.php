<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentClasss extends Model
{
    use HasFactory;

    function amount(){
        return $this->hasMany(FeeAmount::class,'student_classses_id');
    }

    function assignSubject(){
        return $this->hasMany(AssignSubject::class,'class_id');
    }
}
