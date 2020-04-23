<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    protected $fillable = [
        'programme_id',
        'curricular_name',
        'effect_from',
    ];
}
