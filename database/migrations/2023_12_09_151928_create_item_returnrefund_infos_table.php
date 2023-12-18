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
        Schema::create('item_returnrefund_infos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('purchase_item_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('seller_id')->constrained()->cascadeOnDelete();

            $table->integer('item_quantity');
            $table->timestamp('request_date');
            $table->string('status');
            $table->string('reason');
            $table->string('condition');
            $table->string('refund_option')->nullable();
            $table->timestamp('agreement_date')->nullable();
            $table->timestamp('returned_date')->nullable();
            $table->timestamp('completion_date')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_returnrefund_infos');
    }
};
