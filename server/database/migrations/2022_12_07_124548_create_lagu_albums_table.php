<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lagu_albums', function (Blueprint $table) {
            $table->string('nama_lagu', 255);
            $table->string('nama_album', 255);

            $table->timestamps();

            $table->foreign('nama_lagu')->references('lagu')->on('lagus');
            $table->foreign('nama_album')->references('nama_album')->on('albums');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lagu_albums');
    }
};
