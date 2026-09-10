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
        Schema::create('home_page_sliders', function (Blueprint $table) {
            $table->id();
            $table->string('slider1_first_note')->nullable();
            $table->string('slider1_second_note');
            $table->string('slider1_third_note');
            $table->string('slider1_fourth_note')->nullable();
            $table->string('slider1_fifth_note');
            $table->string('slider1_image');

            $table->string('slider2_first_note')->nullable();
            $table->string('slider2_second_note');
            $table->string('slider2_third_note');
            $table->string('slider2_fourth_note');
            $table->string('slider2_image');

            $table->string('slider3_first_note')->nullable();
            $table->string('slider3_second_note');
            $table->string('slider3_third_note');
            $table->string('slider3_fourth_note');
            $table->string('slider3_image');
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
        Schema::dropIfExists('home_page_sliders');
    }
};
