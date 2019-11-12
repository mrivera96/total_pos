<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->primary();
            $table->string('user_name', 45);
            $table->string('user_last_name', 45);
            $table->string('user_nick_name', 15)->unique();
            $table->int('user_dni', 13)->unique();
            $table->date('user_birthday');
            $table->date('user_register_date');
            $table->integer('user_cellphone',8)->unique();
            $table->string('user_address',45);
            $table->string('user_email',45)->unique();
            $table->string('password',15);
            $table->int('role_id')->unsigned();
            $table->int('branch_id')->unsigned();
            $table->rememberToken();
        });

        Schema::table('users', function (Blueprint $table){
            $table->foreign('role_id')->references('role_id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('branch_id')->references('branch_id')->on('branchs')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
