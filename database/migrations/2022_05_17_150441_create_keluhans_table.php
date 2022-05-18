<?php

use Facade\Ignition\Tabs\Tab;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeluhansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keluhan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_anggota');
            $table->date('tgl_pengajuan');
            $table->string('jenis_keluhan', 100);
            $table->text('deskripsi');
            $table->date('tgl_survey')->nullable();
            $table->date('tgl_selesai')->nullable();
            $table->string('status', 50);
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
        Schema::dropIfExists('keluhan');
    }
}
