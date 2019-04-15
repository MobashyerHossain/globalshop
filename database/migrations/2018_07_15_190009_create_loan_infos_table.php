<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoanInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('consumer_id')->unsigned();
            $table->foreign('consumer_id')->references('id')->on('consumers')->onDelete('cascade');
            $table->integer('car_id')->unsigned();
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
            $table->boolean('approval')->default(false);
            $table->float('requested_loan_percentage');

            //additional information
            $table->string('applicant_proffesion');
            $table->integer('applicant_national_id')->unsigned();
            $table->foreign('applicant_national_id')->references('id')->on('images')->onDelete('cascade');
            $table->integer('applicant_bank_statment')->unsigned();
            $table->foreign('applicant_bank_statment')->references('id')->on('images')->onDelete('cascade');
            $table->integer('applicant_tax_clearence')->unsigned();
            $table->foreign('applicant_tax_clearence')->references('id')->on('images')->onDelete('cascade');
            $table->integer('applicant_passport')->unsigned()->nullable();
            $table->foreign('applicant_passport')->references('id')->on('images')->onDelete('cascade');
            $table->integer('additional_1')->unsigned()->nullable();
            $table->foreign('additional_1')->references('id')->on('images')->onDelete('cascade');
            $table->integer('additional_2')->unsigned()->nullable();
            $table->foreign('additional_2')->references('id')->on('images')->onDelete('cascade');
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
        Schema::dropIfExists('loan_infos');
    }
}
