<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRinciansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rincians', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('pencairan_id');
            $table->unsignedbigInteger('kendaraan_id')->nullable();
            $table->unsignedbigInteger('item_id');
            $table->text('uuid')->nullable();
            $table->double('volume');
            $table->double('total_harga_item')->nullable();
            $table->date('tanggal_pengisian')->nullable();
            $table->foreign('pencairan_id')->references('id')->on('pencairans')->onDelete('cascade');
            $table->foreign('kendaraan_id')->references('id')->on('kendaraans')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
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
        Schema::dropIfExists('rincians');
    }
}
