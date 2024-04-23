<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePollingTable extends Migration
{
    public function up()
    {
        Schema::create('polling', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('prodis_id');
            $table->foreign('prodis_id')->references('id')->on('prodis'); // Kunci asing ke tabel prodis
            $table->string('nama_polling', 45)->unique();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->integer('status_polling')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('polling');
    }

};
