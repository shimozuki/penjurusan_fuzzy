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
        Schema::create('hasil_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('warga_id')->unsigned();
            $table->integer('rank_hasil');
            $table->double('bobot_hasil');
            $table->enum('status', ['1', '0'])->default(null)->nullable(true);
            $table->integer('hasil_id')->unsigned();
            $table->timestamps();

            $table->foreign('hasil_id')->references('id')->on('hasil')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hasil_detail');
    }
}
