<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggaranListriksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggaran_listrik', function (Blueprint $table) {
            $table->id();
            $table->year('tahun');
            $table->unsignedSmallInteger('bulan');
            $table->unsignedBigInteger('anggaran');
            $table->date('tgl_bayar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anggaran_listrik');
    }
}
