<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('tax_profiles', function (Blueprint $table) {
            $table->string('taxpayer_type')->after('id'); // Individual or Corporate
            $table->string('full_name')->nullable()->after('taxpayer_type');
            $table->string('business_name')->nullable()->after('full_name');
            $table->string('email')->unique()->after('business_name');
            $table->string('phone_number')->after('email');
            $table->string('local_government')->after('phone_number');
            $table->string('tax_category')->after('local_government'); // Mining, Sand Packing, etc.
            $table->string('business_reg_number')->nullable()->after('tax_category');
            $table->string('identification_number')->nullable()->after('business_reg_number');
            $table->string('registered_address')->after('identification_number');
            $table->unsignedBigInteger('assigned_agent_id')->nullable()->after('registered_address');
            $table->enum('status', ['Pending', 'Active', 'Suspended'])->default('Pending')->after('assigned_agent_id');

            $table->foreign('assigned_agent_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('tax_profiles', function (Blueprint $table) {
            $table->dropColumn([
                'taxpayer_type', 'full_name', 'business_name', 'email', 'phone_number', 'local_government',
                'tax_category', 'business_reg_number', 'identification_number', 'registered_address',
                'assigned_agent_id', 'status'
            ]);
        });
    }
};
