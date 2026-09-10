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
        Schema::create('switchers', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('ads_1')->default('0')->nullable();
            $table->tinyInteger('ads_2')->default('0')->nullable();
            $table->tinyInteger('ads_3')->default('0')->nullable();
            $table->tinyInteger('ads_4')->default('1')->nullable();
            $table->tinyInteger('sponsors')->default('0')->nullable();
            $table->tinyInteger('popup_subscriber')->default('1')->nullable();
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
        Schema::dropIfExists('switchers');
    }
};
