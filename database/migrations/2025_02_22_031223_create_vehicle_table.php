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
        Schema::create('vehicle_categories', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("icon_path")->nullable();
            $table->timestamps();
        });

        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_category_id')->references('id')->on('vehicle_categories')->onDelete('cascade');
            $table->foreignId('vehicle_status_id')->references('id')->on('vehicle_statusses')->onDelete('cascade');
            $table->string("name");
            $table->string("description")->nullable();
            $table->string("image_path")->nullable();
            $table->float("weight")->nullable();
            $table->float("height")->nullable();
            $table->float("length")->nullable();
            $table->float("width")->nullable();
            $table->float("capacity")->nullable();
            $table->string("number_plate")->nullable();
            $table->float("fuel_needed");
            $table->float("fuel_remaining");
            $table->timestamp("last_time_service")->nullable();
            $table->timestamps();
        });

        Schema::create('vehicle_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade');
            $table->foreignId('vehicle_document_status_id')->references('id')->on('vehicle_document_statusses')->onDelete('cascade');
            $table->string("name");
            $table->string("document_path");
            $table->string("note")->nullable();
            $table->timestamps();
        });

        Schema::create('vehicle_maintenances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade');
            $table->foreignId('vehicle_maintenance_status_id')->references('id')->on('vehicle_maintenance_statusses')->onDelete('cascade');
            $table->timestamp("done_maintenance_estimation")->nullable();
            $table->string("note")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_categories');
        Schema::dropIfExists('vehicles');
        Schema::dropIfExists('vehicle_documents');
        Schema::dropIfExists('vehicle_maintenances');
    }
};
