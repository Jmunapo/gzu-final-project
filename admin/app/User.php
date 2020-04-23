<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use NotificationChannels\WebPush\HasPushSubscriptions;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable,
    HasPushSubscriptions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','gender',
        'phone', 'job_title', 'role', 'joining_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
