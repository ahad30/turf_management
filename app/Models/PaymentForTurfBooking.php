<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentForTurfBooking extends Model
{
    use HasFactory;
    protected $fillable = [
        'book_uid',
        "booking_id",
        "payment_with",
        "payment_date",
        "transaction_number",
        "transaction_code",
        "total_amount",
        "paid_amount",
        "due_amount",
        "payment_status",
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
