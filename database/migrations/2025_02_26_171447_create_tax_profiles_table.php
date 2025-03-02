<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tax_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('additional_info')->nullable(); // Optional additional details (e.g., truck size)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tax_profiles');
    }
};
