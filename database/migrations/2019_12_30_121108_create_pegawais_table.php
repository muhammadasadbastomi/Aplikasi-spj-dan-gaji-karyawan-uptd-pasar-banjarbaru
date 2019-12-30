<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('golongan_id');
            $table->unsignedbigInteger('jabatan_id');
            $table->text('uuid')->nullable();
            $table->string('nama')->length('100');
            $table->string('NIP')->length('25');
            $table->string('tempat_lahir')->length(255);
            $table->date('tanggal_lahir');
            $table->string('alamat')->length(255);
            $table->string('jk')->length(25);
            $table->string('agama')->length(25);
            $table->string('status_pegawai')->length(25);
            $table->string('status_kawin')->length(25);
            $table->string('golongan_darah')->length(5);
            $table->string('foto')->length('255')->default('default.jpg');
            $table->foreign('golongan_id')->references('id')->on('golongans')->onDelete('cascade');
            $table->foreign('jabatan_id')->references('id')->on('jabatans')->onDelete('cascade');
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
        Schema::dropIfExists('pegawais');
    }
}