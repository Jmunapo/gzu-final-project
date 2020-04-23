<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegisteredStudent extends Model
{
    protected $fillable = [
        'reg_number',
        'course_code',
    ];
}
