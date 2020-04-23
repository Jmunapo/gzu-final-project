<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'department_id',
        'course_code',
        'course_name',
        'university_wide',
        'course_description',
    ];
}
