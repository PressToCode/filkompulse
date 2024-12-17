<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Verified_user extends Model
{
    protected $table = 'verified_users';
    protected $primaryKey = 'VerifiedID';
    protected $fillable = [
        'user_id',
        'verified_type',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(user::class, 'user_id', 'id');
    }

    public function event(): HasMany
    {
        return $this->hasMany(Event::class, 'verifiedUserID', 'VerifiedID');
    }
}
