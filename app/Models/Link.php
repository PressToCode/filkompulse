<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Link extends Model
{
    protected $table = 'links';
    protected $primaryKey = 'linkID';
    protected $fillable = [
        'events_id',
        'URL',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class, 'events_id', 'eventsID');
    }
}
