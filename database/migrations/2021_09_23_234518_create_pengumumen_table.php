<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengumumenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengumuman', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul_pengumuman', 250);
            $table->text('keterangan_pengumuman');
            $table->date('tanggal_pengumuman');
            $table->enum('status_pengumuman', ['buka', 'tutup']);
            $table->integer('penilaian_id')->unsigned();
            $table->string('kuota_pengumuman', 25);
            $table->timestamps();

            $table->foreign('penilaian_id')->references('id')->on('penilaian')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengumuman');
    }
}
