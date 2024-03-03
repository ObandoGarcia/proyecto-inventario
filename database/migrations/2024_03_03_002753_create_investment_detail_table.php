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
        Schema::create('investment_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('project_id');
            $table->unsignedInteger('material_id');
            $table->integer('delivered_quantity');
            $table->integer('returned_quantity');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('project_machinery_id');
            $table->dateTime('date');
            $table->unsignedInteger('report_id');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('material_id')->references('id')->on('construction_material');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('project_machinery_id')->references('id')->on('project_machinery_detail');
            $table->foreign('report_id')->references('id')->on('reports');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investment_detail');
    }
};
