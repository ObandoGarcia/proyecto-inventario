<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('construction_material', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->integer('amount');
            $table->boolean('available');
            $table->string('description', 150);
            $table->dateTime('admission_date');
            $table->unsignedInteger('state_id');
            $table->unsignedInteger('supplier_id');
            $table->unsignedInteger('brand_id');
            $table->unsignedInteger('user_id');
            $table->foreign('state_id')->references('id')->on('state');
            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('construction_material');
    }
};
