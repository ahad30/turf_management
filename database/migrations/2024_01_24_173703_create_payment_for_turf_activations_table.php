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
        Schema::create('payment_for_turf_activations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('turf_id')->nullable();
            $table->string('payment_with')->nullable();
            $table->string('payment_date')->nullable();
            $table->string('transaction_number')->nullable();
            $table->string('transaction_code')->nullable();
            $table->integer('amount')->nullable();
            $table->tinyInteger('payment_for')->default(0)->comment('0=registration, 1=reactivation');
            $table->tinyInteger('payment_status')->default(0)->comment('0=processing, 1=accepted, 2=canceled');
            $table->foreign('turf_id')->references('id')->on('turfs')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_for_turf_activations');
    }
};
