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
        Schema::create('food', function (Blueprint $table) {
            $table->id();
            // Food Group ID
            $table->unsignedBigInteger('food_group_id');
            $table->foreign('food_group_id')->references('id')->on('food_groups');

            // Name
            $table->string('name');
            // Slug
            $table->string('slug')->unique();
            // Description
            $table->longText('description')->nullable()->default(null);
            // Image
            $table->longText('image')->nullable()->default(null);
            // Energy
            $table->integer('energy')->nullable()->default(null);
            // Protein
            $table->integer('protein')->nullable()->default(null);
            // Fat
            $table->integer('fat')->nullable()->default(null);
            // Carbohydrates
            $table->integer('carbohydrates')->nullable()->default(null);
            // Calcium
            $table->integer('calcium')->nullable()->default(null);
            // Phosphorus
            $table->integer('phosphorus')->nullable()->default(null);
            // Iron
            $table->integer('iron')->nullable()->default(null);
            // Vitamin A
            $table->integer('vitamin_a')->nullable()->default(null);
            // Vitamin B1
            $table->integer('vitamin_b1')->nullable()->default(null);
            // Vitamin C
            $table->integer('vitamin_c')->nullable()->default(null);
            // F-Edible (BDD)
            $table->integer('f_edible')->nullable()->default(null);
            // F-Weight 
            $table->integer('f_weight')->nullable()->default(null);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food');
    }
};
