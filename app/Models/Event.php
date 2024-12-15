<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;

    protected $primaryKey = 'eventsID';

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
        return $this->belongsToMany(Keranjang::class, 'KeranjangHasEvent', 'eventsID', 'eventsID');
    }

    public function categorie(): BelongsToMany
    {
        return $this->belongsToMany(Categorie::class, 'EventHasCategories', 'eventsID', 'events_ID');
    }

    public function image(): HasMany
    {
        return $this->hasMany(Image::class, 'events_id', 'eventsID');
    }

    public function link(): HasMany
    {
        return $this->hasMany(Link::class, 'events_id', 'eventsID');
    }
}

