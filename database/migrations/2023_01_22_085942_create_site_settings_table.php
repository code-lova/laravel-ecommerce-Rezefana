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
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('site_name');
            $table->longText('keywords');
            $table->text('site_desc');
            $table->string('live_chat_id')->nullable();
            $table->string('email');
            $table->string('mobile');
            $table->longText('address');
            $table->string('opening_days');
            $table->tinyInteger('payment')->default('1');
            $table->tinyInteger('registration')->default('1');
            $table->tinyInteger('email_notify')->default('1');
            $table->tinyInteger('seller')->default('0');
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
        Schema::dropIfExists('site_settings');
    }
};
