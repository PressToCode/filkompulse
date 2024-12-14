<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventHasCategories extends Model
{
    protected $fillable = [
        'events_ID',
        'categories_ID',
    ];
}
