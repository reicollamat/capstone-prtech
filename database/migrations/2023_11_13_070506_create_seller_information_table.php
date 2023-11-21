<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * 'shop_name',
     * 'registered_business_name',
     * 'pickup_address',
     * 'email',
     * 'phone_number',
     * 'seller_type',
     * 'registered_address',
     * 'city',
     * 'postal_code',
     * 'tin_number',
     * 'business_permit',
     * 'user_id'
     */
    public function up(): void
    {
        Schema::create('seller_information', function (Blueprint $table) {
            $table->id();
            $table->string('shop_name')->nullable();
            $table->string('shop_email')->nullable();
            $table->string('shop_phone_number')->nullable();
            $table->string('shop_address')->nullable();
            $table->string('shop_city')->nullable();
            $table->string('shop_state_province')->nullable();
            $table->string('shop_postal_code')->nullable();

            $table->string('registered_business_name')->nullable();
            $table->string('registered_address')->nullable();
            $table->string('registered_city')->nullable();
            $table->string('registered_state_province')->nullable();
            $table->string('registered_postal_code')->nullable();

            $table->string('seller_type')->nullable();
            $table->string('business_permit')->nullable();

            $table->unsignedBigInteger('user_id')->unique();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seller_information');
    }
};
