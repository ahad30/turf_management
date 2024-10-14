<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('turf_id')->nullable();
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('book_uid')->unique();
            $table->string('customer_email')->nullable();
            $table->string('customer_phone_number')->nullable();
            $table->date('date')->nullable();
            $table->string('shift')->nullable();

            $table->json('slot')->nullable();
            $table->json('products')->nullable();
            $table->tinyInteger('playing_status')->default(0)->comment('pay with friends = 0 & pay with Others = 1');
            $table->tinyInteger('status')->default(0)->comment('0=on hold, 1=paid, 2=completed, 3=canceled');
            $table->foreign('turf_id')->references('id')->on('turfs')->onDelete('set null');
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
