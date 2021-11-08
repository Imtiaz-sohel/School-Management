<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignSubject extends Model
{
    use HasFactory;

    function class(){
        return $this->belongsTo(StudentClasss::class,'class_id');
    }

    function subject(){
        return $this->belongsTo(StudentSubject::class,'subject_id');
    }
}
