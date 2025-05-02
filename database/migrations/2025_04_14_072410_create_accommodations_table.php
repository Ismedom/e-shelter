<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('accommodations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_information_id')->constrained('business_information')->onDelete('cascade');
            $table->foreignId('business_owner_id')->constrained('users')->onDelete('cascade');
            $table->string('accommodation_name');
            $table->string('accommodation_type')->nullable();
            $table->string('accommodation_address');
            $table->string('city');
            $table->string('state_province')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('country');
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->string('accommodation_registration_number')->nullable();
            $table->string('contact_email');
            $table->string('contact_phone');
            $table->text('description')->nullable();
            $table->text('amenities')->nullable(); 
            $table->integer('star_rating')->nullable();
            $table->time('check_in_time')->default('14:00:00');
            $table->time('check_out_time')->default('12:00:00');
            $table->boolean('is_active')->default(true);
            $table->boolean('has_free_wifi')->default(false);
            $table->boolean('has_parking')->default(false);
            $table->boolean('has_pool')->default(false);
            $table->boolean('has_gym')->default(false);
            $table->boolean('has_restaurant')->default(false);
            $table->boolean('has_air_conditioning')->default(false);
            $table->string('thumbnail_image')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accommodations');
    }
};
