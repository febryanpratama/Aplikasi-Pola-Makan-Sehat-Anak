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
        Schema::create('standars', function (Blueprint $table) {
            $table->id();
            // Umur (Bulan)
            $table->integer('old');
            // Jenis Kelamin
            $table->enum('gender', ['boy', 'girl']);
            // Tipe Standar (Berat Badan, Panjang Badan)
            $table->enum('type', ['weight', 'height']);
            // -3SD
            $table->float('minus_3_sd');
            // -2SD
            $table->float('minus_2_sd');
            // -1SD
            $table->float('minus_1_sd');
            // Median
            $table->float('median');
            // +1SD
            $table->float('plus_1_sd');
            // +2SD
            $table->float('plus_2_sd');
            // +3SD
            $table->float('plus_3_sd');
            // Standar Protein 
            $table->float('standar_protein');
            // Standar Energi
            $table->float('standar_energy');
            // Standar Lemak
            $table->float('standar_lemak');
            // Standar Karbohidrat
            $table->float('standar_carbohydrat');
            // Description
            $table->longText('description')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('standars');
    }
};
