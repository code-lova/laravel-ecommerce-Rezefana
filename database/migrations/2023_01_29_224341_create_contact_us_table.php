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
        Schema::create('contact_us', function (Blueprint $table) {
            $table->id();
            $table->string('banner')->nullable();
            $table->string('banner_title');
            $table->string('banner_sub_title');
            $table->string('contact_info');
            $table->longText('contact_info_details');
            $table->string('address_head');
            $table->string('days_time_head');
            $table->string('days1');
            $table->string('time1');
            $table->string('days2');
            $table->string('time2');
            $table->string('question_head');
            $table->string('question_details');
            $table->string('store_heading');
            $table->longText('store_details_1');
            $table->string('store_img_1');
            $table->longText('store_details_2');
            $table->string('store_img_2');
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
        Schema::dropIfExists('contact_us');
    }
};
