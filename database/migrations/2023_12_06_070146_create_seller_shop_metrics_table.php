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
        Schema::create('seller_shop_metrics', function (Blueprint $table) {
            $table->id();
            $table->float('total_earnings')->default(0)->nullable();
            $table->integer('target_sales')->default(10000)->nullable();
            $table->unsignedBigInteger('seller_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seller_shop_metrics');
    }
};
