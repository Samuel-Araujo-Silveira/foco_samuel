<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Guest extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 
        'reserve_id',
        'name',
        'last_name',
        'phone',
    ];
}
