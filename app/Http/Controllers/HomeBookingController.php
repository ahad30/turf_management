<?php

namespace App\Http\Controllers;

use App\Models\Slot;
use App\Models\Turf;
use App\Models\Booking;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\SendInvoiceMail;
use App\Services\CalculateSlots;
use Illuminate\Support\Facades\DB;
use App\Traits\JavaScriptTophpTrait;
use Illuminate\Support\Facades\Mail;
use App\Models\PaymentForTurfBooking;
use App\Http\Requests\BoookingRequest;
use App\Services\CalculateProductPrice;
use App\Services\DefinePackageGroupByForSlot;

class HomeBookingController extends Controller
{
    use JavaScriptTophpTrait;
    /**
     *
     * return booking page
     *
     */
    public function book(Request $request)
    {

        $turf = Turf::find($request->turf)->load('timing');

        return view('common.book', ['turf' => $turf]);
    }
    /**
     *
     * Fetch Slots
     *
     */

    public function slots($turfId, $date, $month, $year, $packageId)
    {
        $shiftDurationGrouper = new DefinePackageGroupByForSlot();
        $shiftAndGroup = $shiftDurationGrouper->define($packageId);

        $shift = $shiftAndGroup[0];
        $groupBy = $shiftAndGroup[1];


        $turf = Turf::find($turfId);

        $slots = Slot::where('shift_id', $shift)->select('id', 'from', 'to')->get();


        $groupedSlots = $slots->chunk($groupBy);

        return response()->json([
            'status' => true,
            'slots' => $groupedSlots,
            'branch_id' => $turf->branch_id

        ]);
    }


    /**
     * For Products
     *
     */
    public function products(Request $request)
    {

        $products = Product::where('branch_id', $request->branch_id)->where('quantity', '>', 0)->get();
        return $products;
    }
    /**
     * Add Product To Cart
     *
     */

    public function addToCart(Request $request)
    {
        $priceCalculator = new CalculateProductPrice();
        $products = $priceCalculator->calculate($request->products);
        session()->put('products', $products['products']);
        session()->put('product-subtotal', $products['subtotal']);
        return $products;
    }
    /**
     * calculateTotal
     *
     */
    public function calculateTotal(Request $request)
    {

        $productPrice = session()->get('product-subtotal');
        // Getting turf
        $turf = Turf::find($request->turf)->load('timing');
        $perSlot = $turf->timing[(int) $request->package_id]->amount;
        // multiply per slot price with number of slots
        $totalForTurfBooking = $perSlot * (int) $request->numOfSlots;
        // Sum total price + productPrice
        $totalPrice = $totalForTurfBooking + $productPrice;
        session()->put('totalPrice', $totalPrice);

        return $totalPrice;
    }

    /**
     * For booking
     *
     */

    public function booking(Request $request)
    {

        $turf = Turf::find($request->turf_id);
        // Checking if turf is found or not
        if (!$turf) {
            return redirect()->back()->with('error', 'turf not found');
        }


        //  slot collection
        $slotCollector = new CalculateSlots;
        $slots = $slotCollector->collect($request->selected_time);


        if ($request->products) {
            // From Javascript String object to php array
            $products = $this->jsTophp($request->products);

            //  product collection
            $productCollector = new CalculateProductPrice;
            $products = $productCollector->calculate($products);
        } else {
            $products = [];
        }

        // Define Shift
        $shiftDurationGrouper = new DefinePackageGroupByForSlot();
        $shiftAndGroup = $shiftDurationGrouper->define($request->package_id);
        $shift = $shiftAndGroup[0];


        // Storing data
        DB::beginTransaction();
        try {
            $invoice = Str::random(5) . uniqId();

            $booking = Booking::create([
                'turf_id' => $turf->id,
                'branch_id' => $turf->branch_id,
                'book_uid' => $invoice,  //Invoice number
                'turf_name' => $turf->name,
                'playing_status' => $request->playing_status,
                'shift' => $shift,
                'slot' => json_encode($slots),
                'products' => json_encode($products['products']),
                'customer_name' => $request->customer_name,
                'customer_email' => $request->customer_email,
                'customer_phone_number' => $request->customer_phone_number,
                'date' => date('Y-m-d')
            ]);

            $payment = PaymentForTurfBooking::create([
                'book_uid' => $invoice,
                'booking_id' => $booking->id,
                'payment_with' => $request->payment_with,
                'payment_date' => date('Y-m-d'),
                'transaction_number' => $request->transaction_number,
                'transaction_code' => $request->payment_type,
                'total_amount' => session('totalPrice'),
                'paid_amount' => $request->amount,
                'due_amount' => session('totalPrice') - $request->amount,

            ]);


            DB::commit();

            // Sending mail after booking

            Mail::to($request->customer_email)->send(
                (new SendInvoiceMail())->afterCommit()
            );

            return redirect('payment-successful');

        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }

    }
}