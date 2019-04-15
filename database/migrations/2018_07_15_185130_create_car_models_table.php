<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);             //GT
            $table->string('details', 500);
            $table->string('Year_from_to', 20);     //1999-2010

            //foreign key
            $table->integer('maker_id')->unsigned();
            $table->foreign('maker_id')->references('id')->on('car_makers')->onDelete('cascade');
            $table->integer('image_id')->unsigned()->default(2);
            $table->foreign('image_id')->references('id')->on('images')->onDelete('cascade');
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
        Schema::dropIfExists('car_models');
    }
}
