<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timing extends Model
{
    use HasFactory;
    protected $fillable = [
        'duration',
        'amount',
        'shift_id',
        'turf_id',

    ];
}