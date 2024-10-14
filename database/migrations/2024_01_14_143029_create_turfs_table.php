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
        Schema::create('turfs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('turf_owner_id');
            $table->unsignedBigInteger('branch_id');
            $table->unsignedBigInteger('city_id')->nullable();
            $table->string('turf_name')->unique();
            $table->string('map_iframe')->nullable();
            $table->string('map_url')->nullable();
            $table->string('unique_code')->unique();
            $table->json('images')->nullable();
            $table->string('size')->nullable();
            $table->string('turf_type')->nullable();
            $table->string('phone')->nullable();
            $table->text('location')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('account_holder_name')->nullable();
            $table->string('account_type')->nullable();
            $table->string('account_number')->nullable();
            $table->string('qr_code')->nullable();
            $table->tinyInteger('status')->default(2)->comment('0=inactive, 1=active, 2=on hold');
            $table->text('description')->nullable();
            $table->date('activated_at')->nullable();
            $table->date('deactivated_at')->nullable();
            $table->foreign('turf_owner_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('turfs');
    }
};
