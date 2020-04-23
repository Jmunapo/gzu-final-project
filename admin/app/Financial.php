<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Financial extends Model
{
    protected $fillable = [
        'reg_number',
        'fees_type',
        'amount',
    ];
}
