<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VenueTimetable extends Model
{
    protected $fillable = [
        'venue_id',
        'course_id',
        'group_size',
        'exam_date',
    ];
}
