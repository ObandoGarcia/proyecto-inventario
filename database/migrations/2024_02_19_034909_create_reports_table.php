<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50);
            $table->dateTime('creation_date', 25);
            $table->string('report_type', 100);
            $table->text('description');
            $table->string('report_url', 250);
            $table->unsignedInteger('state_id');
            $table->unsignedInteger('user_id');
            $table->foreign('state_id')->references('id')->on('state');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
