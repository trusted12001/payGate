<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pos_machines', function (Blueprint $table) {
            $table->id();
            $table->string('pos_code')->unique();
            $table->string('status')->default('active'); // Options: active, maintenance, decommissioned
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pos_machines');
    }
};
