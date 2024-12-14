<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Keranjang extends Model
{
    protected $fillable = [
        'keranjangID',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function event(): BelongsToMany
    {
        return $this->belongsToMany(Event::class, 'KeranjangHasEvent', 'keranjangID', 'keranjangID');
    }
}
