<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShowRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('show_rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->enum('status', ['active', 'removed'])->default('active');
            $table->string('email')->unique();
            $table->string('website')->unique()->nullable();

            //foreign key
            $table->integer('logo')->unsigned()->default(4);
            $table->foreign('logo')->references('id')->on('images')->onDelete('cascade');
            $table->integer('address_id')->unsigned()->nullable();
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
            $table->integer('phone_number_id')->unsigned()->nullable();
            $table->foreign('phone_number_id')->references('id')->on('phone_numbers')->onDelete('cascade');
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
        Schema::dropIfExists('show_rooms');
    }
}
