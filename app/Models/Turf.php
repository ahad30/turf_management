<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turf extends Model
{
    use HasFactory;

    protected $table = "turfs";
    protected $fillable = [
        'turf_owner_id',
        'branch_id',
        'city_id',
        'turf_name',
        'unique_code',
        'images',
        'size',
        'turf_type',
        'contact',
        'location',
        'thumbnail',
        'status',
        'description',
        'bank_name',
        'account_holder_name',
        'account_type',
        'account_number',
        'qr_code',
        'phone',
        'activated_at',
        'deactivated_at',
    ];

    public function turfOwner()
    {
        return $this->belongsTo(User::class, 'turf_owner_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function booking()
    {
        return $this->hasMany(Booking::class);
    }
    public function timing()
    {
        return $this->hasMany(Timing::class);
    }

    public function getImagesAttribute( $images)
    {
        if($images){
            return json_decode($images);
        }
    }

    public function setImagesAttribute(array $images)
    {
        return json_encode($images);
    }

    public function activationPayments()
    {
        return $this->hasMany(PaymentForTurfActivation::class);
    }
}
