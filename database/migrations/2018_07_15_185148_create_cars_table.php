<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->double('buying_price', 10, 2);      //for showroom
            $table->double('selling_price', 10, 2);     //for consumer
            $table->float('max_possible_discount')->nullable();
            $table->float('current_discount')->nullable();

            //foreign key
            $table->integer('model_id')->unsigned();
            $table->foreign('model_id')->references('id')->on('car_models')->onDelete('cascade');
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
        Schema::dropIfExists('cars');
    }
}
