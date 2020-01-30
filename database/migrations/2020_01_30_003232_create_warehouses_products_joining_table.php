<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarehousesProductsJoiningTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouses_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('warehouse_id')->unsigned();
            $table->integer('available_stock')->unsigned();

            $table->unique(['product_id','warehouse_id']);

            $table->timestamps();

            $table->foreign('product_id')
                ->references('id')->on('products')
                ->onDelete('cascade');
            
            $table->foreign('warehouse_id')
                ->references('id')->on('warehouses')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('warehouses_products');
    }
}
