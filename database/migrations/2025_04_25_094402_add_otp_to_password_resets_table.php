<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOtpToPasswordResetsTable extends Migration
{
    public function up()
    {
        Schema::table('password_resets', function (Blueprint $table) {
            if (!Schema::hasColumn('password_resets', 'otp')) {
                $table->string('otp')->nullable();
            }
            
            // Check if token exists in case it wasn't in the original schema
            if (!Schema::hasColumn('password_resets', 'token')) {
                $table->string('token')->nullable();
            }
        });
    }

    public function down()
    {
        Schema::table('password_resets', function (Blueprint $table) {
            if (Schema::hasColumn('password_resets', 'otp')) {
                $table->dropColumn('otp');
            }
            
            // Only drop token if we added it
            if (Schema::hasColumn('password_resets', 'token') && 
                !in_array('token', ['email', 'created_at'])) { // don't drop if it was original
                $table->dropColumn('token');
            }
        });
    }
}