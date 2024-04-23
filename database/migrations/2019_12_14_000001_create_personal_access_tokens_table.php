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
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id(); // Kolom id dengan tipe data BIGINT yang auto-increment
            $table->string('tokenable_type', 255); // Kolom tokenable_type dengan tipe data VARCHAR dan panjang maksimum 255 karakter
            $table->unsignedBigInteger('tokenable_id'); // Kolom tokenable_id dengan tipe data BIGINT yang unsigned
            $table->string('name', 255); // Kolom name dengan tipe data VARCHAR dan panjang maksimum 255 karakter
            $table->string('token', 64); // Kolom token dengan tipe data VARCHAR dan panjang maksimum 64 karakter
            $table->text('abilities'); // Kolom abilities dengan tipe data TEXT
            $table->timestamp('last_used_at')->nullable(); // Kolom last_used_at dengan tipe data TIMESTAMP yang dapat bernilai NULL
            $table->timestamp('expires_at')->nullable(); // Kolom expires_at dengan tipe data TIMESTAMP yang dapat bernilai NULL
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_access_tokens');
    }
};
