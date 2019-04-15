<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoanDecisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_decisions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('loan_info_id')->unsigned();
            $table->foreign('loan_info_id')->references('id')->on('loan_infos')->onDelete('cascade');
            $table->float('approved_loan_percentage')->nullable();
            $table->integer('payback_period')->nullable();
            $table->float('interest_rate')->nullable();
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
        Schema::dropIfExists('loan_decisions');
    }
}
