<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "branch_id",
        "name",
        "color",
        "price",
        "size",
        "quantity",
        "image",
        'type'
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
