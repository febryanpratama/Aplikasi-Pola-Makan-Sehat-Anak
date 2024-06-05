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
        Schema::create('food_recommendations', function (Blueprint $table) {
            $table->id();
            // Child ID
            $table->unsignedBigInteger('child_id');
            $table->foreign('child_id')->references('id')->on('childrens');
            // Food ID
            $table->unsignedBigInteger('food_id');
            $table->foreign('food_id')->references('id')->on('food');
            // Time 
            $table->time('time');
            // Notes
            $table->longText('notes')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_recommendations');
    }
};
