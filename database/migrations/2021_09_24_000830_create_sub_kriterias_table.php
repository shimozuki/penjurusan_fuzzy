<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubKriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_kriteria', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_sub_kriteria', 50);
            $table->string('nama_sub_kriteria', 250);
            $table->enum('bobot_sub_kriteria', ['1', '3', '5', '7', '9']);
            $table->text('keterangan_sub_kriteria')->nullable();
            $table->integer('kriteria_id')->unsigned();
            $table->timestamps();

            $table->foreign('kriteria_id')->references('id')->on('kriteria')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_kriteria');
    }
}
