<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FeeAmount;

class FeeCategory extends Model
{
    use HasFactory;

    function amount(){
        return $this->belongsTo(FeeAmount::class,'fee_categories_id');
    }
}
