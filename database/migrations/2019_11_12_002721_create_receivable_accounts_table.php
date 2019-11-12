<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceivableAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receivable_accounts', function (Blueprint $table) {
            $table->increments('receivable_account_id')->primary();
            $table->increments('receivable_account_id')->primary();
            $table->increments('receivable_account_id')->primary();
            $table->increments('receivable_account_id')->primary();
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
        Schema::dropIfExists('receivable_accounts');
    }
}
