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
            $table->increments('branch_id')->primary();
			$table->string('branch_name', 45);
			$table->string('description',45);
			$table->date('branch_register_date');
			$table->int('branch_register_number');
			$table->string('branch_address',50);
			$table->int('branch_open_hour');
			$table->int('branch_close_hour');
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
