<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'full_description', 'image_url', 'location', 'date'];

    protected $dates = ['date'];

    public function types()
    {
        return $this->hasMany(CompetitionType::class);
    }

    public function details()
    {
        return $this->hasMany(CompetitionDetail::class);
    }
}

