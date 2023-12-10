<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('cpus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->string('category');
            $table->string('name');
            $table->string('brand')->nullable();
            $table->decimal('price');
            $table->string('core_count');
            $table->string('core_clock');
            $table->string('boost_clock');
            $table->integer('tdp');
            $table->string('graphics')->nullable();
            $table->boolean('smt')->nullable();
            // $table->string('image')->default('img/showcase1.jpg');
            $table->longText('description')->nullable();
            $table->string('status')->default('available');
            $table->string('condition');
            $table->integer('purchase_count')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('cpus');
    }
};
