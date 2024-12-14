<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KeranjangHasEvent extends Model
{
    protected $fillable = [
        'keranjangID',
        'eventsID',
    ];
}
