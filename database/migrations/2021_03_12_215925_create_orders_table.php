<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create Orders Table
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('staff_id')->nullable();
            $table->string('order_no');
            $table->string('receipt_no')->nullable();
            $table->string('address');
            $table->string('city');
            $table->string('country');
            $table->unsignedBigInteger('product_id');
            $table->integer('qty');
            $table->boolean('status')->default(0);
            $table->timestamps();

             //ASSIGN FOREIGN KEY ATTRIBUTES TO user_id and product_id fields.
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
