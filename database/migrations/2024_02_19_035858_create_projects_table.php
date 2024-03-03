<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name', 250);
            $table->string('location');
            $table->string('manager', 250);
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->unsignedInteger('state_id');
            $table->unsignedInteger('user_id');
            $table->foreign('state_id')->references('id')->on('state');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
