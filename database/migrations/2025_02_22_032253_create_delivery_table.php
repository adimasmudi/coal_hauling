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
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->string("source_address");
            $table->string("destination_address");
            $table->string("note")->nullable();
            $table->timestamps();
        });

        Schema::create('vehicle_deliveries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade');
            $table->foreignId('delivery_id')->references('id')->on('deliveries')->onDelete('cascade');
            $table->foreignId('delivery_status_id')->references('id')->on('delivery_statusses')->onDelete('cascade');
            $table->string("note")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliveries');
        Schema::dropIfExists('vehicle_deliveries');
    }
};
