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
        Schema::create('headphones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->decimal('price');
            $table->string('type');
            $table->json('frequency_response')->nullable();
            $table->boolean('microphone');
            $table->boolean('wireless');
            $table->string('enclosure_type');
            $table->string('color')->nullable();
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
        Schema::dropIfExists('headphones');
    }
};
