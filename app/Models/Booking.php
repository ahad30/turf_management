<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'turf_id',
        'book_uid',
        'branch_id',
        'customer_name',
        'customer_email',
        'customer_phone_number',
        'date',
        'shift',
        'slot',
        'playing_status',
        'status',
        'products'
    ];

    public function turf()
    {
        return $this->belongsTo(Turf::class);
    }

    public function bookingPayments()
    {
        return $this->hasMany(PaymentForTurfBooking::class);
    }


    public function getProductsAttribute($products)
    {
        return json_decode($products);
    }

    // public function setProductsAttribute($products)
    // {
    //     return json_encode($products);
    // }
    public function getSlotAttribute($slots)
    {
        return json_decode($slots);
    }
}
