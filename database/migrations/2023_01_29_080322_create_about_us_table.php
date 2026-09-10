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
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->string('banner');
            $table->string('banner_title');
            $table->string('banner_sub_title');
            $table->longText('our_vision');
            $table->longText('our_mission');
            $table->longText('who_we_are_1');
            $table->longText('who_we_are_2');
            $table->string('img_1');
            $table->string('img_2');
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
        Schema::dropIfExists('about_us');
    }
};
