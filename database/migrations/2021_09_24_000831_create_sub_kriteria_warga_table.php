<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubKriteriaWargaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_kriteria_warga', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('warga_id')->unsigned();
            $table->integer('sub_kriteria_id')->unsigned();
            $table->timestamps();
            $table->foreign('warga_id')->references('id')->on('warga')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('sub_kriteria_id')->references('id')->on('sub_kriteria')->onDelete('cascade')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_kriteria_warga');
    }
}
