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
        Schema::create('keyboards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->decimal('price');
            $table->string('style');
            $table->string('switches')->nullable();
            $table->string('backlit')->nullable();
            $table->boolean('tenkeyless');
            $table->string('connection_type');
            $table->string('color')->nullable();
            $table->string('image')->default('img/showcase1.jpg');
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
        Schema::dropIfExists('keyboards');
    }
};
