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
        Schema::create('video_cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->string('category');
            $table->string('name');
            $table->string('brand')->nullable();
            $table->decimal('price');
            $table->string('chipset');
            $table->integer('memory');
            $table->integer('core_clock')->nullable();
            $table->integer('boost_clock')->nullable();
            $table->integer('length')->nullable();
            $table->string('color')->nullable();
            $table->string('image')->default('img/showcase1.jpg');
            $table->longText('description');
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
    public function down(): void
    {
        Schema::dropIfExists('video_cards');
    }
};
