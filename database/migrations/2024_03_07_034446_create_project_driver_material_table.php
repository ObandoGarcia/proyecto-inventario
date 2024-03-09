<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('project_driver_material', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('driver_id');
            $table->unsignedInteger('project_id');
            $table->unsignedInteger('material_id');
            $table->text('observations');
            $table->integer('delivered_quantity');
            $table->integer('returned_quantity');
            $table->unsignedInteger('user_id');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('material_id')->references('id')->on('construction_material');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('driver_id')->references('id')->on('vehicle_driver');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('project_driver_material');
    }
};
