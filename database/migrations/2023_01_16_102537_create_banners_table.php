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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('banner1_first_note');
            $table->string('banner1_second_note');
            $table->string('banner1_third_note');
            $table->string('banner1_fourth_note');
            $table->string('banner1_image');

            $table->string('banner2_first_note');
            $table->string('banner2_second_note');
            $table->string('banner2_third_note');
            $table->string('banner2_fourth_note');
            $table->string('banner2_image');

            $table->string('banner3_first_note');
            $table->string('banner3_second_note');
            $table->string('banner3_third_note');
            $table->string('banner3_fourth_note');
            $table->string('banner3_image');

            $table->string('banner4_first_note');
            $table->string('banner4_second_note');
            $table->string('banner4_third_note');
            $table->string('banner4_fourth_note');
            $table->string('banner4_fifth_note');
            $table->string('banner4_image');

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
        Schema::dropIfExists('banners');
    }
};
