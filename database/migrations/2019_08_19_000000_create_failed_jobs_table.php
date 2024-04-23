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
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id(); // Kolom id dengan tipe data BIGINT yang auto-increment
            $table->string('uuid', 255); // Kolom uuid dengan tipe data VARCHAR dan panjang maksimum 255 karakter
            $table->text('connection'); // Kolom connection dengan tipe data TEXT
            $table->text('queue'); // Kolom queue dengan tipe data TEXT
            $table->longText('payload'); // Kolom payload dengan tipe data LONGTEXT
            $table->longText('exception'); // Kolom exception dengan tipe data LONGTEXT
            $table->timestamp('failed_at'); // Kolom failed_at dengan tipe data TIMESTAMP
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('failed_jobs');
    }
};
