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
        Schema::create('albums', function (Blueprint $table) {
            $table->string('nama_album', 25);
            $table->string('nama_lagu', 255);
            $table->timestamps();

            // $table->primary('nama_album');
            $table->primary(['nama_album', 'nama_lagu']);
            $table->foreign('nama_lagu')->references('lagu')->on('lagus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {      
        // $table->dropForeign('album_nama_lagu_foreign');        
        Schema::dropIfExists('albums');
    }
};
