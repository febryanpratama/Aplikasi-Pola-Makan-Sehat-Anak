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
        Schema::create('childrens', function (Blueprint $table) {
            $table->id();
            // User ID  
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            // Name
            $table->string('name');
            // Slug
            $table->string('slug')->unique();
            // Avatar
            $table->longText('avatar')->nullable()->default(null);
            // Gander Enum from Man, woman
            $table->enum('gander', ['boy', 'girl']);
            // Birthdate
            $table->date('birthdate');
            // Place of birth
            $table->string('place')->nullable()->default(null);
            // Blood type
            $table->enum('blood_type', ['A', 'B', 'AB', 'O']);
            // Body Length
            $table->integer('height')->nullable()->default(null);
            // Body Weight
            $table->integer('weight')->nullable()->default(null);
            // Notes
            $table->longText('notes')->nullable()->default(null);
            // Allergies
            $table->longText('allergies')->nullable()->default(null);
            // Chronic diseases
            $table->longText('chronic_diseases')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('childrens');
    }
};
