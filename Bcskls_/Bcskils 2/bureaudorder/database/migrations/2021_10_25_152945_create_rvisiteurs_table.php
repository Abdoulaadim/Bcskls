<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRvisiteursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rvisiteurs', function (Blueprint $table) {
            $table->id();
            $table->string('division');
            $table->string('service');
            $table->string('objet');
            $table->string('description');
            $table->string('name');
            $table->string('file_path');
            $table->integer('id_visiteur')->unsigned();
            $table->foreign('id_visiteur')->references('id')->on('visiteurs')->onDelete('cascade');
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
        Schema::dropIfExists('rvisiteurs');
    }
}
