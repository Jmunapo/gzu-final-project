<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    //TODO: add fees inputs here
    protected $fillable = [
        'department_id',
        'programme_code',
        'graduate_level',
        'programme_name',
        'conventional_duration',
        'block_duration',
        'normal_entry_requirements',
        'mature_entry_requirements',
        'special_entry_requirements',
        'notes',
        'fees_new',
        'fees_returning',
    ];
}
