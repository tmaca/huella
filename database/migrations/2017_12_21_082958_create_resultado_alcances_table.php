<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultadoAlcancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultado_alcances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('year');
            $table->integer('building_id')->unsigned();
            $table->foreign('building_id')->references('id')->on('buildings')->onDelete("cascade")->onUpdate("cascade");
            $table->string('calculo_huella');
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
        Schema::dropIfExists('resultado_alcances');
    }
}
