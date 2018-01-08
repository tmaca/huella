<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('building_id')->unsigned();
            $table->foreign('building_id')->references('id')->on('buildings')->onDelete("cascade")->onUpdate("cascade");
            $table->integer('year');
            $table->unique(['building_id','year']);
            $table->string('carbon_footprint');
            $table->string("a1_gas_natural_kwh");
            $table->string("a1_gas_natural_nm3");
            $table->string("a1_refrigerantes");
            $table->string("a1_recarga_gases_refrigerantes");
            $table->string("a2_electricidad_kwh");
            $table->string("a3_agua_potable_m3");
            $table->string("a3_papel_carton_consumo_kg");
            $table->string("a3_papel_carton_residuos_kg");
            $table->string("a3_factor_kwh_nm3");
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
        Schema::dropIfExists('studies');
    }
}
