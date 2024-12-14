<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Categorie extends Model
{
    protected $fillable = [
        'categoryName',
        'categoryDescription',
    ];

    public function event(): BelongsToMany
    {
        return $this->belongsToMany(Event::class, 'EventHasCategories', 'CategoryID', 'categories_ID');
    }
}