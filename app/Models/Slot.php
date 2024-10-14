<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    use HasFactory;
    protected $fillable = [
        'group_id',
        'from',
        'to',
        'duration',
        'shift_id',
    ];
    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }
}