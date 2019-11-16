<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayableAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payable_accounts', function (Blueprint $table) {
            $table->increments('payable_account_id');
            $table->dateTime('payable_account_date');
            $table->char('payable_account_type');
            $table->double('payable_account_amount');
            $table->integer('purchase_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('payable_accounts', function (Blueprint $table){
            $table->foreign('purchase_id')->references('purchase_id')->on('purchases')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payable_accounts');
    }
}
