<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
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
