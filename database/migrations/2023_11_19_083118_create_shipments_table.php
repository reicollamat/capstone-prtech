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
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();

            // user specific
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();

            // delivery specifc
            $table->string('status')->nullable();
            $table->string('referenceId')->unique();
            $table->dateTime('shippeddate')->nullable();

            // address
            $table->string('street_address_1')->nullable();
            $table->string('street_address_2')->nullable();
            $table->string('state_province')->nullable();
            $table->string('city')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('country')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
