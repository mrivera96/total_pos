<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('customer_id')->primary();
            $table->string('customer_name', 45);
            $table->string('customer_last_name', 45);
            $table->date('customer_birthday');
            $table->integer('customer_dni',13)->unique();
            $table->string('customer_email', 45)->unique();
            $table->integer('customer_cellphone', 8)->unique();
            $table->string('customer_address', 45);
            $table->integer('customer_active', 1);
            
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
        Schema::dropIfExists('customers');
    }
}
