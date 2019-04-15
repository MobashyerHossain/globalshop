<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('part_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();     //Ex. Brake System, Oil and Fluids, Filters etc.
            $table->string('details', 500)->nullable(); //Brief intro

            //foreign key
            $table->integer('image_id')->unsigned()->default(4);
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
        Schema::dropIfExists('part_categories');
    }
}
