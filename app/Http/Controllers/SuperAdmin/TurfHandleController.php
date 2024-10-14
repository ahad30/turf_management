<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Events\TurfStatusEvent;
use App\Http\Controllers\Controller;
use App\Models\PaymentForTurfActivation;
use App\Models\Turf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Session;

class TurfHandleController extends Controller
{
    // Active turf
    public function ActiveTurfs()
    {
        $turfs = Turf::where('status', '1')->latest()->paginate(20);
        return view('admin.turfs.index', compact('turfs'));
    }

    // New Turf Request
    public function newTurfRequest()
    {
        $turfs = Turf::where('status', '0')->latest()->paginate(20);
        return view('admin.turfs.index', compact('turfs'));
    }

    // OnHoldTurfs
    public function OnHoldTurfs()
    {
        $turfs = Turf::where('status', '2')->latest()->paginate(20);
        return view('admin.turfs.index', compact('turfs'));
    }

    // Edit Turfs Detail
    public function EditTurfsDetail($id)
    {
        $turf = Turf::find($id);
        if (!$turf) {
            Session::flash('warning', 'No Turfs Found');
            return back();
        }

        $payments = PaymentForTurfActivation::where('turf_id', $turf->id)->orderBy('id', 'desc')->take(5)->get();
        return view('admin.turfs.edit', compact(['turf', 'payments']));
    }

    // Change Payment Status
    public function ChangePaymentStatus(Request $request, $id)
    {
        $payment = PaymentForTurfActivation::find($id);
        if (!$payment) {
            Session::flash('warning', 'Payment not found');
            return back();
        }

        $payment->update([
            'payment_status' => $request->payment_status,
        ]);
        Session::flash('success', 'Payment Status Changed');
        return back();
    }

    // Change turf status
    public function ChangeTurfStatus(Request $request, $id)
    {
        $turf = Turf::find($id);
        if (!$turf) {
            Session::flash('warning', 'Turf not found');
            return back();
        }

        $payment = PaymentForTurfActivation::where('turf_id', $turf->id)->orderBy('id', 'DESC')->first();
        if (!$payment) {
            Session::flash('warning', 'Turf activation Payment not found');
            return back();
        }

        if ($payment->payment_status == '1') {
            try {
                if ($request->status == '1') {
                    $turf->update([
                        'status' => $request->status,
                        'activated_at' => date('Y-m-d'),
                        'deactivated_at' => date("Y-m-d", strtotime("+30 days")),
                    ]);

                    // Send email notification
                    Event::dispatch(new TurfStatusEvent($turf->id));

                    Session::flash('success', 'Turf Status Changed');
                    return back();
                } else {
                    $turf->update([
                        'status' => $request->status,
                        'deactivated_at' => null,
                    ]);

                    // Send email notification
                    Event::dispatch(new TurfStatusEvent($turf->id));

                    Session::flash('success', 'Turf Status Changed');
                    return back();
                }
            } catch (\Exception $e) {
                Session::flash('warning', 'something went wrong');
                return back();
            }
        } else {
            Session::flash('warning', 'Turf activation Payment found without accepted status. Please try to accept payment first.');
            return back();
        }
    }
}
