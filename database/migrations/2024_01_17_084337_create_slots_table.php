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
        Schema::create('slots', function (Blueprint $table) {
            $table->id();
            // $table->string('group_id');
            $table->string('from');
            $table->string('to');
            $table->string('duration');
            $table->unsignedBigInteger('shift_id')->default(1);
            $table->foreign('shift_id')->references('id')->on('shifts');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slots');
    }
};