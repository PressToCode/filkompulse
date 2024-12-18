<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventHasCategories extends Model
{
    protected $table = 'events_has_categories';
    protected $fillable = [
        'events_ID',
        'categories_ID',
    ];
}
