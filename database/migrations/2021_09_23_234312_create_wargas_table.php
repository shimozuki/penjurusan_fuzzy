<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warga', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_warga', 150);
            $table->text('alamat_warga');
            $table->string('no_hp_warga', 50);
            $table->integer('verifikasi_data_id')->unsigned();
            $table->timestamps();

            $table->foreign('verifikasi_data_id')->references('id')->on('verifikasi_data')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('warga');
    }
}
