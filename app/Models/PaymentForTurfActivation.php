<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentForTurfActivation extends Model
{
    use HasFactory;
    protected $fillable = [
        "turf_id",
        "payment_date",
        "payment_with",
        "transaction_number",
        "transaction_code",
        "amount",
        "payment_for",
        "payment_status"
    ];

    public function turf()
    {
        return $this->belongsTo(Turf::class);
    }
}
