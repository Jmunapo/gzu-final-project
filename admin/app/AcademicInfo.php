<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicInfo extends Model
{
    protected $fillable = [
        'reg_number',
        'level',
        'fees',
    ];
}
