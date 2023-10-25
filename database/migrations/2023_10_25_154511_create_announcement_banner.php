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
        Schema::create('banner_announcements', function (Blueprint $table) {
            $table->id();
            $table->string('announcement')->nullable();
            $table->string('category')->nullable();
            $table->dateTime('validity_start');
            $table->dateTime('validity_end');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('announcement_banner');
    }
};
