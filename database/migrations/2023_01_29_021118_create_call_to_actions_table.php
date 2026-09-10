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
        Schema::create('call_to_actions', function (Blueprint $table) {
            $table->id();
            $table->string('cta_heading_1');
            $table->string('cta_sub_1');
            $table->string('cta_heading_2');
            $table->string('cta_sub_2');
            $table->string('cta_heading_3');
            $table->string('cta_sub_3');
            $table->string('cta_heading_4');
            $table->string('cta_sub_4');
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
        Schema::dropIfExists('call_to_actions');
    }
};
