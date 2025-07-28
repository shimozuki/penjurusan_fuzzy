<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aktual', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('penilaian_id')->unsigned();
            $table->integer('warga_id')->unsigned();
            $table->timestamps();

            $table->foreign('penilaian_id')->references('id')->on('penilaian')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('warga_id')->references('id')->on('warga')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aktual');
    }
}
