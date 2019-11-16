<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_detail', function (Blueprint $table) {
            $table->increments('sale_detail_id')->primary();
            $table->double('sale_discount')->nullable();
            $table->integer('sale_quantity');
            $table->double('sale_unit_price');
            $table->integer('sale_id')->unsigned();
            $table->integer('product_id')->nullable()->unsigned();
            $table->integer('service_id')->nullable()->unsigned();
            $table->integer('tax_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('sale_detail', function (Blueprint $table){
            $table->foreign('sale_id')->references('sale_id')->on('sales')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('service_id')->references('service_id')->on('services')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tax_id')->references('tax_id')->on('taxes')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sale_detail');
    }
}
