<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetitionType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'image_url'];

    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }
}

