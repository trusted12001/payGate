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
        Schema::create('revenue_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mineral_id')->constrained('mineral_deposits')->onDelete('cascade');
            $table->decimal('per_gram', 10, 2)->nullable();
            $table->decimal('per_kg', 10, 2)->nullable();
            $table->decimal('per_bag', 10, 2)->nullable();
            $table->decimal('per_ton', 10, 2)->nullable();
            $table->decimal('per_truck', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('revenue_settings');
    }
};
