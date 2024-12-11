<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetitionDetail extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'image_url'];

    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }
}

