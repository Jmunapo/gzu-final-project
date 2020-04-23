<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'department_name',
        'school_id',
        'about_department',
        'start_date',
    ];
}
