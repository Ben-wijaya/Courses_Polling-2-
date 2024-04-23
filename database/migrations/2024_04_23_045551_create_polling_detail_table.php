<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePollingDetailTable extends Migration
{
    public function up()
    {
        Schema::create('polling_detail', function (Blueprint $table) {
            $table->unsignedInteger('polling_id');
            $table->foreign('polling_id')->references('id')->on('polling'); // Kunci asing ke tabel prodis
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users'); // Kunci asing ke tabel prodis
            $table->unsignedBigInteger('mata_kuliah_id');
            $table->foreign('mata_kuliah_id')->references('id')->on('mata_kuliah'); // Kunci asing ke tabel prodis
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('polling_detail');
    }
}

