<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('part_sub_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();           //Ex. Air Filter, Brake Pad etc.
            $table->string('details', 500)->nullable();      //Brief intro

            //foreign key
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('part_categories')->onDelete('cascade');
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
        Schema::dropIfExists('part_sub_categories');
    }
}
