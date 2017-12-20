<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlcances3Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alcances3', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('building_id')->unsigned();
            $table->foreign('building_id')->references('id')->on('buildings')->onDelete("cascade")->onUpdate("cascade");
            $table->string('year');
            $table->string("agua_potable_m3");
            $table->string("papel_carton_consumo_kg");
            $table->string("papel_carton_residuos_kg");
            $table->string("factor_kwh_nm3");
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
        Schema::dropIfExists('alcances3');
    }
}
