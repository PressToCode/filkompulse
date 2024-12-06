<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'date',
        'image',
        'has_reminder',
        'is_selected',
    ];

    protected $casts = [
        'date' => 'datetime',
        'has_reminder' => 'boolean',
        'is_selected' => 'boolean',
    ];
}

