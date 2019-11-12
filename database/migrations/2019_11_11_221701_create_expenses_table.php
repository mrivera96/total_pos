<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->increments('expense_id')->primary();
            $table->string('expense_description');
            $table->integer('expense_bill_number');
            $table->date('expense_date');
            $table->double('expense_amount');
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('expenses', function (Blueprint $table){
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenses');
    }
}
