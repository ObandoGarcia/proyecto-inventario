<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vehicle_driver_machinery', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('vehicle_driver_id');
            $table->unsignedInteger('machinery_id');
            $table->string('observations');
            $table->unsignedInteger('state_id');
            $table->dateTime('date');
            $table->unsignedInteger('user_id');
            $table->foreign('state_id')->references('id')->on('state');
            $table->foreign('vehicle_driver_id')->references('id')->on('vehicle_driver');
            $table->foreign('machinery_id')->references('id')->on('machinery');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vehicle_driver_machinery');
    }
};
