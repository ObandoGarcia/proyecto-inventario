<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('project_machinery_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('project_id');
            $table->unsignedInteger('machinery_id');
            $table->text('observations');
            $table->foreign('machinery_id')->references('id')->on('machinery');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('project_machinery_detail');
    }
};
