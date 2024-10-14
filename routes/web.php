<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SlotController;
use App\Http\Controllers\TurfController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeBookingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\Staff\StaffBookingHandleController;
use App\Http\Controllers\TurfOwner\StaffController;
use App\Http\Controllers\TurfOwner\BranchController;
use App\Http\Controllers\Staff\StaffDashboardController;
use App\Http\Controllers\Staff\StaffTurfHandleController;
use App\Http\Controllers\SuperAdmin\TurfHandleController;
use App\Http\Controllers\SuperAdmin\TurfOwnersController;
use App\Http\Controllers\Staff\StaffStoreHandleController;
use App\Http\Controllers\SuperAdmin\AdminDashboardController;
use App\Http\Controllers\SuperAdmin\TransactionController;
use App\Http\Controllers\TurfOwner\TurfBookingHandleController;
use App\Http\Controllers\TurfOwner\TurfOwnerDashboardController;
use App\Http\Controllers\CommonPagesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TurfOwnerBookingHandleController;
use App\Http\Controllers\NewTurfRegisterController;
use App\Http\Controllers\ShiftController;
use App\Models\Setting;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('minify')->group(function () {
    /* -------------------------------------------------------------------------- */
    /*                             Unprotected routes                             */
    /* -------------------------------------------------------------------------- */
    Route::controller(HomeController::class)
        ->group(function () {
            Route::get('/', 'index')->name('home');
            Route::get('/about', 'about')->name('about');
            Route::get('/turf/{id}', 'turfDetails')->name('turfDetails');
            Route::get('/contact', 'contact')->name('contact');
            Route::get('/match-making', 'matchMaking')->name('match.making');
            // contact store
            Route::post('/contact/store', 'contactStore')->name('contact.store');
            Route::get('/new_turf_register', 'newTurfRegister')->name('newturfregister');
            Route::post('/new_turf_register', 'newTurfRegisterStore')->name('newturfregister.store');
        });

    Route::get('/faqs', [CommonPagesController::class, 'Faq'])->name('faqs');
    Route::get('/terms', [CommonPagesController::class, 'Term'])->name('terms');
    Route::get('/privacy', [CommonPagesController::class, 'Privacy'])->name('privacy');

    // All about Booking from customer side
    Route::controller(HomeBookingController::class)
        ->group(function () {
        });
    // All about Booking from customer side
    Route::controller(HomeBookingController::class)
        ->group(function () {

            /* --------------------------- Go to booking page --------------------------- */
            Route::get('/book', 'book')->name('book');
            /* ------------------------- Fetch available  slots ------------------------- */
            Route::get('/slots/{turfId}/{date}/{month}/{year}/{packageId}', 'slots')->name('slots');

            /* ------------------------- Products  ------------------------- */
            Route::get('/products', 'products')->name('products');


            //   Add Product To Cart
            Route::post('/add-to-cart', 'addToCart')->name('addToCart');
            // Calculate Total
            Route::get('/calculate-total', 'calculateTotal')->name('calculateTotal');
            /* ------------------------- For booking ------------------------- */
            Route::post('/booking', 'booking')->name('booking');
            // Payment successful page
            Route::view('payment-successful', 'payment-success');
        });

    /* -------------------------------------------------------------------------- */
    /*                              Protected Routes                              */
    /* -------------------------------------------------------------------------- */
    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        /* -------------------------------------------------------------------------- */
        /*                             Super Admin Routes                             */
        /* -------------------------------------------------------------------------- */
        Route::group(['middleware' => ['checkUserStatus', 'isAdmin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
            /* ------------------------- Handle admin dashboard ------------------------- */
            Route::controller(AdminDashboardController::class)->group(function () {
                Route::get('/', 'dashboard')->name('home');
            });
            /* --------------------------- Handle Contact Message --------------------------- */
            Route::controller(ContactController::class)->group(function () {
                Route::get('/contact-messages', 'contactMessages')->name('contactMessages');
                Route::get('/contact-messages/{id}', 'showContactMessage')->name('showContactMessage');
                Route::get('/contact-messgae/status/{id}', 'status')->name('status');
                Route::delete('/contact-messages/delete/{id}', 'deleteContactMessage')->name('deleteContactMessage');
            });
            /* --------------------------- Handle New Turf Register --------------------------- */

            Route::resource('newturfregisters', NewTurfRegisterController::class);
            Route::get('newturfregisters/{id}/read', [NewTurfRegisterController::class, 'RegistrationStatus'])->name('newturfregisters.status');

            /* --------------------------- Handle turf owners --------------------------- */

            Route::resource('/turf-owners', TurfOwnersController::class);
            /* ------------------------------ Handle Cities ------------------------------ */

            Route::resource('/cities', CityController::class);
            /* ------------------------------ Handle Slots ------------------------------ */

            Route::resource('/slots', SlotController::class);

            Route::resource('/shifts', ShiftController::class);

            Route::resource('/settings', SettingController::class);

            Route::get('/all-active-turfs', [TurfHandleController::class, 'ActiveTurfs'])->name('activeTurfs');
            Route::get('/new-turfs', [TurfHandleController::class, 'newTurfRequest'])->name('newTurfs');
            Route::get('/on-hold-turfs', [TurfHandleController::class, 'OnHoldTurfs'])->name('onHoldTurfs');

            Route::get('/turfs-info/{id}/edit', [TurfHandleController::class, 'EditTurfsDetail'])->name('editTurfsDetail');
            Route::put('/turfs/change-payment-status/{id}', [TurfHandleController::class, 'ChangePaymentStatus'])->name('turfPaymentStatus');
            Route::put('/turfs/change-status/{id}', [TurfHandleController::class, 'ChangeTurfStatus'])->name('turfStatus');

            /* ------------------------------ Transactions ----------------------------- */
            Route::get('/transactions', [TransactionController::class, 'AcceptedTransaction'])->name('allAcceptedTransaction');
        });

        /* -------------------------------------------------------------------------- */
        /*                              Turf Owner Routes                             */
        /* -------------------------------------------------------------------------- */

        Route::group(['middleware' => ['checkUserStatus', 'isTurfOwner'], 'prefix' => 'turf-owner', 'as' => 'turf-owner.'], function () {
            Route::controller(TurfOwnerDashboardController::class)->group(function () {
                Route::get('/', 'dashboard')->name('home');
            });
            /* ------------------------------ Handle Branch ----------------------------- */
            Route::resource('/branches', BranchController::class);
            /* ------------------------------ Handle staffs ----------------------------- */
            Route::resource('/staffs', StaffController::class);
            /* ------------------------------ Handle staffs ----------------------------- */
            Route::resource('/my-turfs', TurfController::class);
            /* ------------------------------ Handle staffs ----------------------------- */
            Route::resource('/products', ProductController::class);

            Route::get('/{id}/products/{name}', [ProductController::class, 'ProductFilter'])->name('filter.products');
            /* ------------------------------ Handle booking ----------------------------- */
            Route::get('/on-hold/bookings', [TurfBookingHandleController::class, 'onHold'])->name('onHoldTurfBooking');
            Route::get('/paid/bookings', [TurfBookingHandleController::class, 'Paid'])->name('paidTurfBooking');
            Route::get('/complete/bookings', [TurfBookingHandleController::class, 'Complete'])->name('completeTurfBooking');
            Route::get('/cancel/bookings', [TurfBookingHandleController::class, 'Cancel'])->name('cancelTurfBooking');

            Route::get('/info/booking/{id}/edit', [TurfBookingHandleController::class, 'EditBooking'])->name('editBooking');
            Route::put('/info/booking/{id}/update', [TurfBookingHandleController::class, 'UpdateBooking'])->name('updateBooking');
            Route::get('/info/booking/{id}/cancel', [TurfBookingHandleController::class, 'CancelBooking'])->name('cancelBooking');

            /* ------------------------------ Payment for turf activation ----------------------------- */
            Route::get('/turf/activation/payment/{id}', [PaymentController::class, 'TurfActivationPayment'])->name('turfActivationPayment');
            Route::post('/turf/activation/payment/{id}/store', [PaymentController::class, 'StoreTurfActivationPayment'])->name('storeTurfActivationPayment');
            /*------------------------------------Booking Handle Route------------------------------------*/
            Route::get('/booking/verify', [TurfOwnerBookingHandleController::class, 'VerifyBookingHandle'])->name('verifyBookingHandle');
            Route::post('/booking/verification', [TurfOwnerBookingHandleController::class, 'VerificationBooking'])->name('verificationBooking');
            Route::put('/booking/verification/{id}/{payment_id}/update', [TurfOwnerBookingHandleController::class, 'UpdateBookingDetails'])->name('updateBookingDetails');
        });

        /* -------------------------------------------------------------------------- */
        /*                              Turf Staff Routes                             */
        /* -------------------------------------------------------------------------- */
        Route::group(['middleware' => ['checkUserStatus', 'isStaff'], 'prefix' => 'staff', 'as' => 'staff.'], function () {
            Route::controller(StaffDashboardController::class)->group(function () {
                Route::get('/', 'dashboard')->name('home');
            });
            /*------------------------------------My Turf Handle Route------------------------------------*/
            Route::get('/my-turf', [StaffTurfHandleController::class, 'index'])->name('myTurf');
            /*------------------------------------Products Handle Route------------------------------------*/
            Route::get('/products', [StaffStoreHandleController::class, 'index'])->name('products');
            /*------------------------------------Booking Handle Route------------------------------------*/
            Route::get('/booking/pending', [StaffBookingHandleController::class, 'PendingBooking'])->name('pendingBooking');
            Route::get('/booking/completed', [StaffBookingHandleController::class, 'CompletedBooking'])->name('completedBooking');
            Route::get('/booking/{id}/edit/{payment_id}', [StaffBookingHandleController::class, 'EditBookingDetails'])->name('editBookingDetail');
            /*------------------------------------Booking Handle Route------------------------------------*/
            Route::get('/booking/verify', [StaffBookingHandleController::class, 'VerifyBookingHandle'])->name('verifyBookingHandle');
            Route::post('/booking/verification', [StaffBookingHandleController::class, 'VerificationBooking'])->name('verificationBooking');
            Route::put('/booking/verification/{id}/{payment_id}/update', [StaffBookingHandleController::class, 'UpdateBookingDetails'])->name('updateBookingDetails');
        });
    });
});
require __DIR__ . '/auth.php';

// Route::view('/test', 'mail.SendInvoice');
// Route::get('/test', function () {


//     return session()->all();

//     return view('test');

// });
