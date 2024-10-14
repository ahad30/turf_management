<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payment_for_turf_bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('booking_id')->nullable();
            $table->string('book_uid')->unique();
            $table->string('payment_with')->nullable();
            $table->string('payment_date')->nullable();
            $table->string('transaction_number')->nullable();
            $table->string('transaction_code')->nullable();
            $table->integer('total_amount')->nullable();
            $table->integer('paid_amount')->nullable();
            $table->integer('due_amount')->nullable();

            $table->tinyInteger('payment_status')->default(0)->comment('0=pending, 1=paid, 2=complete, 3=rejected');

            $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_for_turf_bookings');
    }
};
