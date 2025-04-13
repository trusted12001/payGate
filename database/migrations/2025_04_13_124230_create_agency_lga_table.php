<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('agency_lga', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agency_id')->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('lga_id'); // assuming LGAs are stored in a reference table
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('agency_lga');
    }
};
