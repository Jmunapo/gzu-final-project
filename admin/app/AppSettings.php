<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppSettings extends Model
{
    protected $fillable = [
        'name',
        'display_name',
        'status',
        'author',
        'description',
    ];
}
