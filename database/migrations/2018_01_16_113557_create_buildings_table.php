<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buildings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer("country_id")->unsigned();
            $table->foreign("country_id")->references("id")->on("countries")->onUpdate("cascasde")->onDelete("cascade");
            $table->integer("region_id")->unsigned();
            $table->foreign("region_id")->references("id")->on("regions")->onUpdate("cascasde")->onDelete("cascade");
            $table->integer("postcode", "5")->nullable();
            $table->string("address_with_number")->nullable();
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
        Schema::dropIfExists('buildings');
    }
}
