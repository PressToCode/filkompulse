<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class GoogleAccountAuth extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'nickname',
        'email',
        'avatar',
        'google_id',
    ];

    protected $hidden = [
        'remember_token'
    ];
}
