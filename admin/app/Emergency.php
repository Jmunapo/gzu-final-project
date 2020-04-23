<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emergency extends Model
{
    protected $fillable = [
        'reporter',
        'reporting_for',
        'subject',
        'description',
        'urgency',
        'address',
    ];
}
