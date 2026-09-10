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
        Schema::create('item_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->tinyInteger('cat_id')->comment('categoryID');
            $table->tinyInteger('sub_cat_id')->comment('SubcategoryID');
            $table->string('slug');
            $table->longText('description');
            $table->string('meta_title');
            $table->string('meta_keyword');
            $table->mediumText('meta_description');
            $table->tinyInteger('status')->default('0')->comment('0=hidden,1=visible');
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
        Schema::dropIfExists('item_categories');
    }
};
