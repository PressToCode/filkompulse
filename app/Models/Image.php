<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Image extends Model
{
    protected $fillable = [
        'events_id',
        'imageURL',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class, 'events_id', 'eventsID');
    }
}
