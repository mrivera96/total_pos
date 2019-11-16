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
            $table->increments('user_id')->primary();
            $table->string('user_name', 45);
            $table->string('user_last_name', 45);
            $table->string('user_nick_name', 15)->unique();
            $table->integer('user_dni')->unique();
            $table->date('user_birthday');
            $table->dateTime('user_register_date');
            $table->integer('user_cellphone')->unique();
            $table->string('user_address',45);
            $table->string('user_email',45)->unique()->nullable();
            $table->string('password',15);
            $table->integer('role_id')->unsigned();
            $table->integer('branch_id')->unsigned();
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
