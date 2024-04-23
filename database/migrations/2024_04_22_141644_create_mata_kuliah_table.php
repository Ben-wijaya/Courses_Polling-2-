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
        Schema::create('mata_kuliah', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 45); // Kolom kode dengan tipe data VARCHAR dan panjang maksimum 45 karakter
            $table->string('nama', 100); // Kolom nama dengan tipe data VARCHAR dan panjang maksimum 100 karakter
            $table->integer('sks'); // Kolom sks dengan tipe data INT
            $table->unsignedBigInteger('prodis_id'); // Kolom prodis_id dengan tipe data BIGINT yang unsigned
            $table->foreign('prodis_id')->references('id')->on('prodis'); // Kunci asing ke tabel prodis
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mata_kuliah');
    }
};
