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
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('partner_status_id')->references('id')->on('partner_statusses')->onDelete('cascade');
            $table->string("name");
            $table->string("address");
            $table->timestamps();
        });

        Schema::create('spare_parts', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("description")->nullable();
            $table->string("image_path")->nullable();
            $table->string("quantity");
            $table->timestamps();
        });

        Schema::create('partner_supplies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('partner_id')->references('id')->on('partners')->onDelete('cascade');
            $table->foreignId('spare_part_id')->references('id')->on('spare_parts')->onDelete('cascade');
            $table->string("note")->nullable();
            $table->string("quantity");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partners');
        Schema::dropIfExists('spare_parts');
        Schema::dropIfExists('partner_supplies');
    }
};
