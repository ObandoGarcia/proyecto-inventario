<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('machinery', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('model', 50);
            $table->string('series', 100);
            $table->string('description', 150);
            $table->integer('amount');
            $table->dateTime('admission_date', 20);
            $table->unsignedInteger('state_id');
            $table->boolean('available');
            $table->unsignedInteger('brand_id');
            $table->unsignedInteger('supplier_id');
            $table->unsignedInteger('user_id');
            $table->foreign('state_id')->references('id')->on('state');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('machinery');
    }
};
