<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reminder extends Model
{
    protected $table = 'reminders';
    protected $primaryKey = 'reminderID';
    protected $fillable = [
        'eventsID',
        'user_id',
        'reminderDate',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function events(): BelongsTo
    {
        return $this->belongsTo(Event::class, 'eventsID', 'eventsID');
    }
}
