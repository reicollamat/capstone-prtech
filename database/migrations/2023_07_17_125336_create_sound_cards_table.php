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
        Schema::create('sound_cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->decimal('price');
            $table->decimal('channels', 8, 1);
            $table->integer('digital_audio')->nullable();
            $table->integer('snr')->nullable();
            $table->integer('sample_rate')->nullable();
            $table->string('chipset')->nullable();
            $table->string('interface');
            $table->string('image')->nullable();
            $table->longText('description');
            $table->string('status')->default('available');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sound_cards');
    }
};
