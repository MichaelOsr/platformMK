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
        Schema::create('lagus', function (Blueprint $table) {
            $table->string('lagu', 255);
            $table->string('artis', 255);
            $table->string('url', 255);
            $table->string('thumbnail', 255);
            $table->timestamps();

            $table->primary('lagu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lagus');

    }
};
