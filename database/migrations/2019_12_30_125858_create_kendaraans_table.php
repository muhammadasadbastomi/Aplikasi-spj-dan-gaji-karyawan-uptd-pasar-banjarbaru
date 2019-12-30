<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKendaraansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('pegawai_id');
            $table->unsignedbigInteger('jenis_kendaraan_id');
            $table->text('uuid')->nullable();
            $table->string('nopol')->length('20');
            $table->string('merk')->length('100');
            $table->string('warna')->length('50');
            $table->foreign('pegawai_id')->references('id')->on('pegawais')->onDelete('cascade');
            $table->foreign('jenis_kendaraan_id')->references('id')->on('jenis_kendaraans')->onDelete('cascade');
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
        Schema::dropIfExists('kendaraans');
    }
}
