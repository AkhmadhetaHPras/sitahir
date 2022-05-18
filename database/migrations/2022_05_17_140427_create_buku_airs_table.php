<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukuAirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku_air', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_anggota');
            $table->year('tahun');
            $table->unsignedSmallInteger('bulan');
            $table->string('foto')->nullable();
            $table->unsignedBigInteger('meteran_air')->nullable();
            $table->unsignedSmallInteger('kubik')->nullable();
            $table->unsignedBigInteger('tarif')->nullable();
            $table->string('status', 20)->nullable();
            $table->dateTime('tgl_bayar')->nullable();
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
        Schema::dropIfExists('buku_air');
    }
}
