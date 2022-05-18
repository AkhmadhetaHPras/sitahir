<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstalasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instalasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_anggota');
            $table->date('tgl_buat');
            $table->dateTime('tgl_survey')->nullable();
            $table->unsignedBigInteger('tarif_instalasi')->nullable();
            $table->dateTime('tgl_pemasangan')->nullable();
            $table->date('tgl_selesai')->nullable();
            $table->string('status', 20);
            $table->timestamps();

            $table->foreign('id_anggota')->references('id')->on('anggota');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instalasi');
    }
}
