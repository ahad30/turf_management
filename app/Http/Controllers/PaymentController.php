<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaymentRequest;
use App\Models\PaymentForTurfActivation;
use App\Models\Setting;
use App\Models\Turf;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    // Turf Activation Payment
    public function TurfActivationPayment($id)
    {
        $turf_info = Turf::find($id);

        if ($turf_info->activated_at != null) {
            Session::flash('error', 'Turf is already activated');
            return back();
        }

        if (!$turf_info) {
            Session::flash("warning", "Invalid Turf");
            return back();
        }

        $settings = Setting::first();
        if (!$settings) {
            Session::flash("warning", "Invalid Settings");
            return back();
        }
        return view("payment.turf-activation-payment", compact(["turf_info", "settings"]));
    }

    // Store Turf Activation Payment
    public function StoreTurfActivationPayment($id, StorePaymentRequest $request)
    {
        $turf_info = Turf::find($id);
        if (!$turf_info) {
            Session::flash("warning", "Invalid Turf");
            return back();
        }

        $previous_payment = PaymentForTurfActivation::where("turf_id", $turf_info->id)->orderBy('id', 'desc')->first();
        if ($previous_payment != null) {
            $payment_for = 1;
        } else {
            $payment_for = 0;
        }

        $payment = PaymentForTurfActivation::create([
            "turf_id" => $turf_info->id,
            "payment_date" => date("Y-m-d"),
            "payment_with" => $request->payment_with,
            "transaction_number" => $request->transaction_number,
            "transaction_code" => Str::upper($request->transaction_code),
            "amount" => $request->amount,
            "payment_for" => $payment_for,
            "payment_status" => 0,
        ]);
        if (!$payment) {
            Session::flash('warning', 'Transaction not completed. Please try again.');
            return back();
        }

        Session::flash("success", "Turf Activation Payment Successfully");
        return redirect()->route("turf-owner.my-turfs.index");
    }
}
