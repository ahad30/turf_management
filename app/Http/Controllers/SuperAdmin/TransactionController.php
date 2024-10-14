<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\PaymentForTurfActivation;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // Accepted Transaction
    public function AcceptedTransaction()
    {
        $payments = PaymentForTurfActivation::where('payment_status', 1)->orderBy("created_at", "desc")->get();
        return view("admin.transactions.accepted", compact("payments"));
    }
}
