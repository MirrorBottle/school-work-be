<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('employee_id');
            $table->dateTime('start_date');
            $table->dateTime('due_date');
            $table->dateTime('paid_date');->nullable();
            $table->integer('interest_percent');
            $table->integer('total_loan');
            $table->integer('total_loan_with_interest');
            $table->integer('total_payment');
            $table->integer('total_payment_interest');
            $table->integer('total_payment_with_interest');
            $table->integer('payment_counts');
            $table->tinyInteger('status')->comment('0 = process, 1 = approve, 2 = rejected');
            $table->boolean('is_approve')->nullable();
            $table->dateTime('loan_date')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('employee_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loans');
    }
}
