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
        Schema::create('business_information', function (Blueprint $table) {
            $table->id();
            $table->string('business_owner')->foreignId('id')->constrained()->onDelete('cascade');
            $table->string('business_name')->nullable();
            $table->string('legal_business_name')->nullable();
            $table->string('busineproperty_typess_address')->nullable();
            $table->string('business_registration_number')->nullable();
            $table->string('email_address')->nullable();
            $table->string('phone_number')->nullable();
            $table->json('alternative_contact_information')->nullable();
            $table->integer('total_of_rooms')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_information');
    }
};
