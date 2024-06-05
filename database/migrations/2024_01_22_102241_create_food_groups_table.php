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
        Schema::create('food_groups', function (Blueprint $table) {
            $table->id();
            // name
            $table->string('name');
            // Slug
            $table->string('slug')->unique();
            // Code Name
            $table->string('code_name')->unique();
            // description
            $table->longText('description')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_groups');
    }
};
