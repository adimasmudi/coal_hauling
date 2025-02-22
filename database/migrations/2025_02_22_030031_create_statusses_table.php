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
        Schema::create('employee_statusses', function (Blueprint $table) {
            $table->id();
            $table->string("name")->unique();
            $table->timestamps();
        });

        Schema::create('vehicle_statusses', function (Blueprint $table) {
            $table->id();
            $table->string("name")->unique();
            $table->timestamps();
        });

        Schema::create('vehicle_document_statusses', function (Blueprint $table) {
            $table->id();
            $table->string("name")->unique();
            $table->timestamps();
        });

        Schema::create('vehicle_maintenance_statusses', function (Blueprint $table) {
            $table->id();
            $table->string("name")->unique();
            $table->timestamps();
        });

        Schema::create('delivery_statusses', function (Blueprint $table) {
            $table->id();
            $table->string("name")->unique();
            $table->timestamps();
        });

        Schema::create('partner_statusses', function (Blueprint $table) {
            $table->id();
            $table->string("name")->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_statusses');
        Schema::dropIfExists('vehicle_statusses');
        Schema::dropIfExists('vehicle_document_statusses');
        Schema::dropIfExists('vehicle_maintenance_statusses');
        Schema::dropIfExists('delivery_statusses');
        Schema::dropIfExists('partner_statusses');
    }
};
