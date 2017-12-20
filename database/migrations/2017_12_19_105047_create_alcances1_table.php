<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlcances1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alcances1', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('building_id')->unsigned();
            $table->foreign('building_id')->references('id')->on('buildings')->onDelete("cascade")->onUpdate("cascade");
            $table->string('year');
            $table->string("gas_natural_kwh");
            $table->string("gas_natural_nm3");
            $table->string("refrigerantes");
            $table->string("recarga_gases_refrigerantes");
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
        Schema::dropIfExists('alcances1');
    }
}
