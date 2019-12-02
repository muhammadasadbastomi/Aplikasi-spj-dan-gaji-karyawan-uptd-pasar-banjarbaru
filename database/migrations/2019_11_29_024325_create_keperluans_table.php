<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeperluansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keperluans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('uuid')->nullable();
            $table->unsignedBigInteger('pajak_id');
            $table->string('keperluan')->length(50);
            $table->timestamps();
            $table->foreign('pajak_id')->references('id')->on('pajaks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keperluans');
    }
}
