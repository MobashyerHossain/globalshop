<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResentViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resent_views', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('product_type', ['car', 'part', 'carmodel', 'partsubcategory']);
            $table->integer('product_id')->unsigned();    //Car Maker or Part SubCategoey
            $table->biginteger('times_visited')->default(1);

            //foreign key
            $table->integer('consumer_id')->unsigned();
            $table->foreign('consumer_id')->references('id')->on('consumers')->onDelete('cascade');
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
        Schema::dropIfExists('resent_views');
    }
}
