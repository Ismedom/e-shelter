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
        Schema::create('accommodations_types', function (Blueprint $table) {
            $table->id();
            $table->string('accommodation_id')->foreignId('id')->constrained('create_accommodations')->onDelete('cascade');
            $table->string('type_id')->foreignId('id')->constrained('types')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accommodations_types');
    }
};
