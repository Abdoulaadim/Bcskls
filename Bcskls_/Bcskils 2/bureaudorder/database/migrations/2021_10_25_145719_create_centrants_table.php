<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCentrantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centrants', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->string('objet');
            $table->string('type');
            $table->string('expiditeur');
            $table->string('division');
            $table->string('service');
            $table->string('employee');
            $table->string('etat');
            $table->date('depart');
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
        Schema::dropIfExists('centrants');
    }
}
