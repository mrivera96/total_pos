<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branchs', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name', 45);
			$table->string('description',45);
            $table->integer('cellphone_number');
            $table->integer('phone_number');
			$table->date('register_date');
			$table->string('register_number',14);
			$table->string('address',70);
			$table->char('open_hour');
			$table->char('close_hour');
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
        Schema::dropIfExists('branchs');
    }
}
