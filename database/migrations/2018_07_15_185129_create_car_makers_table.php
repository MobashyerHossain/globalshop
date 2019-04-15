<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarMakersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_makers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();   //audi
            $table->string('details', 500);

            //foreign key
            $table->integer('logo')->unsigned()->default(4);
            $table->foreign('logo')->references('id')->on('images')->onDelete('cascade');
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
        Schema::dropIfExists('car_makers');
    }
}
