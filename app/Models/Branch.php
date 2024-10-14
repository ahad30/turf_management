<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'branch_owner_id',
        'city_id'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function turfs()
    {
        return $this->hasMany(Turf::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function staffs()
    {
        return $this->hasMany(Staff::class);
    }

    public function branchOwner()
    {
        return $this->belongsTo(User::class);
    }
}