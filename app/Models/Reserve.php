<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Reserve extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'room_id',
        'check_in',
        'check_out',
        'total',
        'hotel_id',
    ];
}
