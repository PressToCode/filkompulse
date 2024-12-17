<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;

    protected $primaryKey = 'eventsID';
    protected $table = 'events';

    protected $fillable = [
        'verifiedUserID',
        'title', 
        'description',
        'date', 
        'location_type',
        'location', 
    ];

    protected $casts = [
        'date' => 'datetime',
    ];

    public function keranjang(): BelongsToMany
    {
        return $this->belongsToMany(Keranjang::class, 'KeranjangHasEvents', 'eventsID', 'keranjangID');
    }

    public function categorie(): BelongsToMany
    {
        return $this->belongsToMany(Categorie::class, 'EventHasCategories', 'eventsID', 'CategoryID');
    }

    public function image(): HasMany
    {
        return $this->hasMany(Image::class, 'events_id', 'eventsID');
    }

    public function link(): HasMany
    {
        return $this->hasMany(Link::class, 'events_id', 'eventsID');
    }

    public function verified_user(): BelongsTo
    {
        return $this->belongsTo(Verified_user::class, 'verifiedUserID', 'VerifiedID');
    }
}

