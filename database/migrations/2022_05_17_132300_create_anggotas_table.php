<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateAnggotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_users');
            $table->string('nama', 50);
            $table->string('alamat', 100);
            $table->date('tgl_gabung')->nullable();
            $table->string('nowa', 20);
            $table->string('foto')->nullable();
            $table->unsignedTinyInteger('instalasi');
            $table->timestamps();

            $table->foreign('id_users')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anggota');
    }
}
