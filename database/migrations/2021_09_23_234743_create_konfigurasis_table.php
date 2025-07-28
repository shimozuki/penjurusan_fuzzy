<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKonfigurasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konfigurasi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_aplikasi',300);
            $table->text('keterangan');
            $table->string('gambar_konfigurasi',300)->nullable();
            $table->string('created_by',300);
            $table->string('facebook',300);
            $table->string('instagram',300);
            $table->string('youtube',300);
            $table->string('email',150);
            $table->text('alamat');
            $table->string('no_hp',30);
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
        Schema::dropIfExists('konfigurasi');
    }
}
