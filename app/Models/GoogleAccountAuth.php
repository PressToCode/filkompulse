<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
        'user_id',
    ];

    protected $hidden = [
        'remember_token'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
