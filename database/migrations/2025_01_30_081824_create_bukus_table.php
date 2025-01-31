<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_buku');
            $table->unsignedBigInteger('harga');
            $table->unsignedBigInteger('stok');
            $table->string('image');
            $table->unsignedBigInteger('id_penerbit');
            $table->unsignedBigInteger('id_genre');
            $table->date('tanggal_terbit');
            $table->timestamps();


            $table->foreign('id_penerbit')->references('id')->on('penerbits')->onDelete('cascade');
            $table->foreign('id_genre')->references('id')->on('genres')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bukus');
    }
};