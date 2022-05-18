<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormInstalasiAlatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_instalasi_alat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_instalasi');
            $table->string('nama_barang', 50);
            $table->unsignedSmallInteger('jumlah');
            $table->unsignedBigInteger('harga_satuan');
            $table->unsignedBigInteger('subtotal');
            $table->timestamps();

            $table->foreign('id_instalasi')->references('id')->on('instalasi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_instalasi_alat');
    }
}
