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
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->id(); // Kolom id dengan tipe data BIGINT yang auto-increment
            $table->string('email', 255); // Kolom email dengan tipe data VARCHAR dan panjang maksimum 255 karakter
            $table->string('token', 255); // Kolom token dengan tipe data VARCHAR dan panjang maksimum 255 karakter
            $table->timestamps(); // Kolom updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('password_reset_tokens');
    }
};
