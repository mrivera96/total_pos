<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->increments('purchase_id')->primary();
            $table->integer('purchase_bill_number');
            $table->dateTime('purchase_date');
            $table->double('purchase_total');
            $table->integer('user_id')->unsigned();
            $table->integer('payment_type_id')->unsigned();
            $table->integer('purchase_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('purchases', function (Blueprint $table){
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('payment_type_id')->references('payment_type_id')->on('payment_types')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
    }
}
