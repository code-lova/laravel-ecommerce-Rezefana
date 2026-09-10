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
        Schema::table('users', function (Blueprint $table) {
            $table->tinyInteger('role_as')->default('0')->after('updated_at')->comment('0=user,1=admin');
            $table->integer('is_active')->default('1')->after('password');
            $table->string('verification_code')->nullable()->after('updated_at');
            $table->string('ip_address')->nullable()->after('updated_at');
            $table->timestamp('last_login')->nullable()->after('updated_at');
            $table->timestamp('last_seen')->nullable()->after('updated_at');
            $table->tinyInteger('email_status')->default('0')->after('password');
            $table->integer('customer_type')->default('0')->after('password')->comment('0=buyer,2=seller');
            $table->timestamp('phone_time')->nullable()->after('password');
            $table->timestamp('email_time')->nullable()->after('password');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role_as');
            $table->dropColumn('is_active');
            $table->dropColumn('verification_code');
            $table->dropColumn('ip_address');
            $table->dropColumn('last_login');
            $table->dropColumn('last_seen');
            $table->dropColumn('email_status');
            $table->dropColumn('customer_type');
            $table->dropColumn('phone_time');
            $table->dropColumn('email_time');
        });
    }
};
