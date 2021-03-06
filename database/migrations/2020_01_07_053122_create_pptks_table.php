<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePptksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pptks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('uuid')->nullable();
            $table->string('NIP')->length(50);
            $table->string('nama')->length(100);
            $table->string('jabatan')->length(50);
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
        Schema::dropIfExists('pptks');
    }
}
