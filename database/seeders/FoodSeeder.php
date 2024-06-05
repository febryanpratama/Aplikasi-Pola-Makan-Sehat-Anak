<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $response = Http::get("http://aplikasi-pola-makan-sehat-anak.test:8080/api/DKBM-Indonesia");

        // Declare the data
        $data = $response->json();

        // Loop through the data
        foreach ($data as $item) {
            // Check if the Food Group exists Code from FOODGROUP
            $foodGroup = \App\Models\FoodGroup::where('code_name', $item['FOODGROUP'])->first();

            // If the Food Group does not exist, create it
            if (!$foodGroup) {
                $foodGroup = \App\Models\FoodGroup::create([
                    'code_name' => $item['FOODGROUP'],
                    'name' => $item['FOODGROUP'],
                    'slug' => \Str::slug($item['FOODGROUP']),
                    'description' => $item['FOODGROUP'],
                ]);
            }

            // Create the food
            try {
                //code...
                // Create Food
                $food = new \App\Models\Food();
                // Food Group ID
                $food->food_group_id = $foodGroup->id;
                // Name
                $food->name = $item['FOODNAME'];
                // Slug
                $food->slug = \Str::slug($item['FOODNAME']);
                // Description
                $food->description = $item['FOODNAME'];
                // Image
                $food->image = 'food.jpg';
                // Energy
                $food->energy = $item['ENERGY'];
                // Protein
                $food->protein = $item['PROTEIN'];
                // Fat
                $food->fat = $item['FATS'];
                // Carbohydrates
                $food->carbohydrates = $item['CARBHDRT'];
                // Calcium
                $food->calcium = $item['CALCIUM'];
                // Phosphorus
                $food->phosphorus = $item['PHOSPHOR'];
                // Iron
                $food->iron = $item['IRON'];
                // Vitamin A
                $food->vitamin_a = $item['VITA'];
                // Vitamin B1
                $food->vitamin_b1 = $item['VITB1'];
                // Vitamin C
                $food->vitamin_c = $item['VITC'];
                // F-Edible (BDD)
                $food->f_edible = $item['F-EDIBLE (BDD)'];
                // F-Weight 
                $food->f_weight = $item['F-WEIGHT'];
                // Save Food
                $food->save();
            } catch (\Throwable $th) {
                //throw $th;
                // Skip the error
                continue;
            }
        }
    }
}
