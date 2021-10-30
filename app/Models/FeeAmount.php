<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FeeCategory;
use App\Models\StudentClasss;

class FeeAmount extends Model
{
    use HasFactory;

    function studentClass(){
        return $this->belongsTo(StudentClasss::class,'student_classses_id');
    }
    function feeCategory(){
        return $this->belongsTo(FeeCategory::class,'fee_categories_id');
    }
}
