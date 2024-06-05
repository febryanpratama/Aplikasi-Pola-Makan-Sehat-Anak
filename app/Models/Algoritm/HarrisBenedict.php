<?php

namespace App\Models\Algoritm;

class HarrisBenedict
{
    // Set Variable
    public $gender;
    public $weight;
    public $height;
    public $ageMonths;
    public $activityFactor;
    public $result;

    // Set Initial Data
    public function __construct($gender, $weight, $height, $ageMonths, $activityFactor)
    {
        // Set Variable
        $this->gender = $gender;
        $this->weight = $weight;
        $this->height = $height;
        $this->ageMonths = $ageMonths;
        $this->activityFactor = $activityFactor;

        // Debugging
        // dd($this->gender, $this->weight, $this->height, $this->ageMonths, $this->activityFactor);

        // 1. Calculate BMR
        $bmr = $this->calculateBMR($this->gender, $this->weight, $this->height, $this->ageMonths);
        // Debugging
        // dd($bmr);

        // 2. Calculate TDEE
        $tdee = $this->calculateTDEE($bmr, $this->activityFactor);
        // Debugging
        // dd($tdee);

        // 3. Calculate Nutrient Distribution
        $nutrientDistribution = $this->calculateNutrientDistribution($tdee);
        // Debugging
        // dd($nutrientDistribution);

        // 4. Return Nutrient Distribution
        $this->result = [
            'energy' => $tdee, // in calories 
            'protein' => $nutrientDistribution['protein'],
            'fat' => $nutrientDistribution['fat'],
            'carbs' => $nutrientDistribution['carbs']
        ];
    }

    // Harris-Benedict
    // Basal Metabolic Rate/BMR
    // Pria:BMR=88.362+(13.397×Berat Badan)+(4.799×Tinggi Badan)−(5.677×Umur)Pria:BMR=88.362+(13.397×Berat Badan)+(4.799×Tinggi Badan)−(5.677×Umur)
    // Wanita:BMR=447.593+(9.247×Berat Badan)+(3.098×Tinggi Badan)−(4.330×Umur)Wanita:BMR=447.593+(9.247×Berat Badan)+(3.098×Tinggi Badan)−(4.330×Umur)
    public function calculateBMR($gender, $weight, $height, $ageMonths)
    {
        // Convert age from months to years for the Harris-Benedict formula
        // $ageYears = $ageMonths / 12;

        if ($gender == 'male' || $gender == 'boy') {
            // return 88.362 + (13.397 * $weight) + (4.799 * $height) - (5.677 * $ageYears);
            return 88.362 + (13.397 * $weight) + (4.799 * $height) - (5.677 * $ageMonths);
        } elseif ($gender == 'female' || $gender == 'girl') {
            // return 447.593 + (9.247 * $weight) + (3.098 * $height) - (4.330 * $ageYears);
            return 447.593 + (9.247 * $weight) + (3.098 * $height) - (4.330 * $ageMonths);
        } else {
            return 0;
        }
    }

    // Total Daily Energy Expenditure/TDEE
    // TDEE=BMR×Aktivitas FisikTDEE=BMR×Aktivitas Fisik
    public function calculateTDEE($bmr, $activityFactor)
    {
        // return $bmr * $activityFactor;
        // Kebutuhan Kalori Harian dalam satuan kkal
        return $bmr * $activityFactor;
    }

    // Distribusi Nutrisi
    public function calculateNutrientDistribution($tdee)
    {
        $proteinPercentage = 0.2;  // 20% of total calories
        $fatPercentage = 0.3;      // 30% of total calories

        $proteinCalories = $tdee * $proteinPercentage;
        $fatCalories = $tdee * $fatPercentage;
        $carbsCalories = $tdee - ($proteinCalories + $fatCalories);

        $proteinGrams = $proteinCalories / 4;  // 1 gram of protein = 4 calories
        $fatGrams = $fatCalories / 9;          // 1 gram of fat = 9 calories
        $carbsGrams = $carbsCalories / 4;      // 1 gram of carbs = 4 calories

        return [
            'protein' => $proteinGrams,
            'fat' => $fatGrams,
            'carbs' => $carbsGrams,
        ];
    }

    // Funtion to get the result
    // public function getResult()
    // {
    //     return $this->return;
    // }
}
