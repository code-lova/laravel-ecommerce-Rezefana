<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->integer('reference');
            $table->tinyInteger('payment_status')->default('0');
            $table->tinyInteger('user_id');
            $table->string('email');
            $table->tinyInteger('delivery_status')->default('0');
            $table->integer('price');
            $table->integer('quantity');
            $table->integer('color');
            $table->integer('size');
            $table->integer('method');
            $table->string('payment_receipt')->nullable();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('orders');
    }
};
