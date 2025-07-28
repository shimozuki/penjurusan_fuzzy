<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObjektifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objektif', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_objektif', 200);
            $table->integer('bobot_ojektif');
            $table->string('value_objektif', 50);
            $table->integer('warga_id')->unsigned();
            $table->timestamps();

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
        Schema::dropIfExists('objektif');
    }
}
