<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Verified_user extends Model
{
    protected $fillable = [
        'user_id',
        'verified_type',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(user::class, 'user_id', 'user_id');
    }
}
