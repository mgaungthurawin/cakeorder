<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_id');
            $table->integer('product_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->boolean('order_status')->unsigned();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::table('orders', function($table) {
           $table->foreign('product_id')->references('id')->on('products');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
