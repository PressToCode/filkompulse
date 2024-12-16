<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KeranjangHasEvent extends Model
{
    protected $table = 'keranjangHasEvents';
    protected $fillable = [
        'keranjangID',
        'eventsID',
    ];
}
