<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CurriculumCourse extends Model
{
    protected $fillable = [
        'curricular_id',
        'level',
        'course_id',
    ];
}
