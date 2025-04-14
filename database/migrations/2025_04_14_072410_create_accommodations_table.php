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
        Schema::create('create_accommodationss', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_information_id')->constrained('business_information')->onDelete('cascade');
            $table->string('business_owner_id')->foreignId('id')->constrained()->onDelete('cascade');
            $table->string('accommodations_name')->nullable();
            $table->string('accommodations_address')->nullable();
            $table->string('accommodations_registration_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('create_hotels');
    }
};
