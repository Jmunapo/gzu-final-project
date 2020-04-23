<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    protected $fillable = [
        'venue_key',
        'venue_name',
        'capacity',
    ];
}
