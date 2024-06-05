<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Algoritm\GeneticAlgoritm;
use Illuminate\Http\Request;

class FoodRecommendationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $childdren)
    {
        // Debugging
        // dd($childdren);

        // Get User/Children Data
        $children = \App\Models\Children::where('slug', $childdren)->first();
        // dd($children);

        // Get All Food Recommendation Data
        $foodRecommendations = \App\Models\FoodRecommendation::where('child_id', $children->id)->paginate(10);
        // Debugging
        // dd($foodRecommendations);

        // Return View
        return view('pages.user.food-recommendation.index', compact('children', 'foodRecommendations'));

        // Old Code
        // // 0-6 Months
        // // Get Foods Data from Database in energy < 550, protein < 12, fat < 34, carbohydrate < 58
        // // $foods = \App\Models\Food::where('energy', '<', 550)->where('protein', '<', 12)->where('fat', '<', 34)->where('carbohydrates', '<', 58)->get();

        // // switch ($age) {
        // //         // 0-6 Months
        // //     case ($age <= 6):
        // //         // Get Foods Data from Database in energy < 550, protein < 12, fat < 34, carbohydrate < 58
        // //         $foods = \App\Models\Food::where('energy', '<', 550)->where('protein', '<', 12)->where('fat', '<', 34)->where('carbohydrates', '<', 58)->get();
        // //         break;
        // //         // 7-12 Months
        // //     case ($age <= 12):
        // //         // Get Foods Data from Database in energy < 725, protein < 18, fat < 36, carbohydrate < 82
        // //         $foods = \App\Models\Food::where('energy', '<', 725)->where('protein', '<', 18)->where('fat', '<', 36)->where('carbohydrates', '<', 82)->get();
        // //         break;
        // //         // 1-3 Years
        // //     case ($age <= 36):
        // //         // Get Foods Data from Database in energy < 1125, protein < 26, fat < 44, carbohydrate < 155
        // //         $foods = \App\Models\Food::where('energy', '<', 1125)->where('protein', '<', 26)->where('fat', '<', 44)->where('carbohydrates', '<', 155)->get();
        // //         break;
        // // }

        // // 7-12 Months
        // // Get Foods Data from Database in energy < 725, protein < 18, fat < 36, carbohydrate < 82
        // // $foods = \App\Models\Food::where('energy', '<', 725)->where('protein', '<', 18)->where('fat', '<', 36)->where('carbohydrates', '<', 82)->get();

        // // 1-3 Years
        // // Get Foods Data from Database in energy < 1125, protein < 26, fat < 44, carbohydrate < 155
        // // $foods = \App\Models\Food::where('energy', '<', 1125)->where('protein', '<', 26)->where('fat', '<', 44)->where('carbohydrates', '<', 155)->get();

        // // 4-6 Years
        // // Get Foods Data from Database in energy < 1600, protein < 35, fat < 62, carbohydrate < 220
        // // $foods = \App\Models\Food::where('energy', '<', 1600)->where('protein', '<', 35)->where('fat', '<', 62)->where('carbohydrates', '<', 220)->get();

        // // 7-9 Years
        // // Get Foods Data from Database in energy < 1850, protein < 49, fat < 72, carbohydrate < 254
        // // $foods = \App\Models\Food::where('energy', '<', 1850)->where('protein', '<', 49)->where('fat', '<', 72)->where('carbohydrates', '<', 254)->get();


        // // Set Initial Data 
        // // 1. Population
        // // Select Population
        // $filter = null;
        // switch ($filter) {
        //     case (isset($filter) || $filter != null || $filter != 'all' || $filter != ''):
        //         // Select FoodGroup = AA
        //         $foodGroup = \App\Models\FoodGroup::where('code_name', $filter)->first();

        //         // Select Population
        //         $population = \App\Models\Food::where('food_group_id', $foodGroup->id)->get();
        //         break;

        //     default:
        //         // 0-6 Months
        //         // Get Foods Data from Database in energy < 550, protein < 12, fat < 34, carbohydrate < 58
        //         // $population = \App\Models\Food::where('energy', '<', 550)->where('protein', '<', 12)->where('fat', '<', 34)->where('carbohydrates', '<', 58)->get();

        //         // 7-12 Months
        //         // Get Foods Data from Database in energy < 725, protein < 18, fat < 36, carbohydrate < 82
        //         // $population = \App\Models\Food::where('energy', '<', 725)->where('protein', '<', 18)->where('fat', '<', 36)->where('carbohydrates', '<', 82)->get();

        //         // 1-3 Years
        //         // Get Foods Data from Database in energy < 1125, protein < 26, fat < 44, carbohydrate < 155
        //         // $population = \App\Models\Food::where('energy', '<', 1125)->where('protein', '<', 26)->where('fat', '<', 44)->where('carbohydrates', '<', 155)->get();

        //         // 4-6 Years
        //         // Get Foods Data from Database in energy < 1600, protein < 35, fat < 62, carbohydrate < 220
        //         // $population = \App\Models\Food::where('energy', '<', 1600)->where('protein', '<', 35)->where('fat', '<', 62)->where('carbohydrates', '<', 220)->get();

        //         // 7-9 Years
        //         // Get Foods Data from Database in energy < 1850, protein < 49, fat < 72, carbohydrate < 254
        //         $population = \App\Models\Food::where('energy', '<', 1850)->where('protein', '<', 49)->where('fat', '<', 72)->where('carbohydrates', '<', 254)->get();

        //         break;
        // }

        // // Harris-Benedict Equation
        // $weight = $children->weight; // Weight in kg
        // $height = $children->height; // Height in cm
        // // Hitung umur dalam bulan (1 tahun = 12 bulan)
        // $birthdate = $children->birthdate; // Age in months
        // // Kurangi dari Hari ini
        // $age = date_diff(date_create($birthdate), date_create('now'))->format('%y');
        // $month = date_diff(date_create($birthdate), date_create('now'))->format('%m');
        // $age = ($age * 12) + $month;
        // $age = $age; // Age in months
        // // dd($age);
        // $gender = 'male';
        // $activityLevel = 1.5; // 1.5 = Active | 1.2 = Moderate | 1.0 = Sedentary | 0.8 = Very Sedentary | 2.0 = Very Active | 2.2 = Extremely Active | 2.4 = Professional Athlete | 2.6 = Olympic Athlete | 2.8 = Super Human | 3.0 = God

        // // Harris-Benedict
        // $now = new \App\Models\Algoritm\HarrisBenedict($gender, $weight, $height, $age, $activityLevel);

        // // 5. Target
        // // Set Target
        // // Harris-Benedict Equation
        // $targetweight = $children->weight + 10; // Weight in kg
        // $targetheight = $children->height + 20; // Height in cm
        // // $targetage = 12; // Age in months
        // // $targetgender = 'male';
        // // $targetactivityLevel = 1.0; // 1.5 = Active | 1.2 = Moderate | 1.0 = Sedentary | 0.8 = Very Sedentary | 2.0 = Very Active | 2.2 = Extremely Active | 2.4 = Professional Athlete | 2.6 = Olympic Athlete | 2.8 = Super Human | 3.0 = God

        // // Harris-Benedict
        // $target = new \App\Models\Algoritm\HarrisBenedict($gender, $targetweight, $targetheight, $age, $activityLevel);

        // // Debugging Harris-Benedict
        // // dd($data, $target);

        // // Generate Population
        // // Hitung nilai maksimum dan minimum dari setiap nutrisi
        // $maxEnergy = $population->max('energy');
        // $minEnergy = $population->min('energy');
        // $maxProtein = $population->max('protein');
        // $minProtein = $population->min('protein');
        // $maxFat = $population->max('fat');
        // $minFat = $population->min('fat');
        // $maxCarbohydrates = $population->max('carbohydrates');
        // $minCarbohydrates = $population->min('carbohydrates');

        // // Range
        // $rangeEnergy = $maxEnergy - $minEnergy;
        // $rangeProtein = $maxProtein - $minProtein;
        // $rangeFat = $maxFat - $minFat;
        // $rangeCarbohydrates = $maxCarbohydrates - $minCarbohydrates;

        // // Satuan Range (1) = 1%
        // $satuanEnergy = $rangeEnergy / 10;
        // $satuanProtein = $rangeProtein / 10;
        // $satuanFat = $rangeFat / 10;
        // $satuanCarbohydrates = $rangeCarbohydrates / 10;

        // // Set Data
        // $data = [
        //     'population' => $population,
        //     'target' => $target,
        //     'now' => $now,
        //     'maxEnergy' => $maxEnergy,
        //     'minEnergy' => $minEnergy,
        //     'maxProtein' => $maxProtein,
        //     'minProtein' => $minProtein,
        //     'maxFat' => $maxFat,
        //     'minFat' => $minFat,
        //     'maxCarbohydrates' => $maxCarbohydrates,
        //     'minCarbohydrates' => $minCarbohydrates,
        //     'rangeEnergy' => $rangeEnergy,
        //     'rangeProtein' => $rangeProtein,
        //     'rangeFat' => $rangeFat,
        //     'rangeCarbohydrates' => $rangeCarbohydrates,
        //     'satuanEnergy' => $satuanEnergy,
        //     'satuanProtein' => $satuanProtein,
        //     'satuanFat' => $satuanFat,
        //     'satuanCarbohydrates' => $satuanCarbohydrates,
        // ];

        // // Set Target
        // $resultEnergy = (($target->result['energy'] - $data['minEnergy']) / $data['satuanEnergy']);
        // $resultEnergy = round($resultEnergy) > 10 ? 10 : round($resultEnergy);
        // $resultProtein = (($target->result['protein'] - $data['minProtein']) / $data['satuanProtein']);
        // $resultProtein = round($resultProtein) > 10 ? 10 : round($resultProtein);
        // $resultFat = (($target->result['fat'] - $data['minFat']) / $data['satuanFat']);
        // $resultFat = round($resultFat) > 10 ? 10 : round($resultFat);
        // $resultCarbohydrates = (($target->result['carbs'] - $data['minCarbohydrates']) / $data['satuanCarbohydrates']);
        // $resultCarbohydrates = round($resultCarbohydrates) > 10 ? 10 : round($resultCarbohydrates);

        // // dd($resultEnergy, $target->result['energy'], $data['minEnergy'], $data['satuanEnergy']);
        // // GeneticAlgorithm
        // // Contoh penggunaan
        // $populationSize = 100;
        // $generations = 100;
        // $mutationRate = 100; // Persentase peluang mutasi
        // $target = $resultEnergy + $resultProtein + $resultFat + $resultCarbohydrates; // Target

        // // Loop 5 Kali untuk Rekomendasi Makanan pada 1 Hari
        // $recommendations = [];
        // for ($f = 0; $f < 3; $f++) {
        //     for ($i = 0; $i < 100; $i++) {
        //         $bestResult = [];
        //         $geneticAlgorithm = new GeneticAlgoritm($populationSize, $generations, $mutationRate, $target);
        //         $bestResult = $geneticAlgorithm->runGeneticAlgorithm();
        //         // dd($bestResult);

        //         // Count Real Result
        //         $realResultEnergy = $data['minEnergy'] + ($bestResult[0] * $data['satuanEnergy']);
        //         $realResultProtein = $data['minProtein'] + ($bestResult[1] * $data['satuanProtein']);
        //         $realResultFat = $data['minFat'] + ($bestResult[2] * $data['satuanFat']);
        //         $realResultCarbohydrates = $data['minCarbohydrates'] + ($bestResult[3] * $data['satuanCarbohydrates']);

        //         // Debugging
        //         // dd($realResultEnergy, $realResultProtein, $realResultFat, $realResultCarbohydrates);

        //         $recommendationFoods = [];
        //         for ($i = 0; $i < 250; $i++) {
        //             foreach ($foods as $index => $food) {
        //                 // dd($food);
        //                 // Cek apakah makanan memiliki nilai protein, lemak, dan karbohidrat yang sesuai dengan hasil algoritma genetika
        //                 if (
        //                     $food->energy == $realResultEnergy || $food->energy == $realResultEnergy + $i || $food->energy == $realResultEnergy - $i
        //                     && $food->protein == $realResultProtein || $food->protein == $realResultProtein + $i || $food->protein == $realResultProtein - $i
        //                     && $food->fat == $realResultFat || $food->fat == $realResultFat + $i || $food->fat == $realResultFat - $i
        //                     && $food->carbohydrates == $realResultCarbohydrates || $food->carbohydrates == $realResultCarbohydrates + $i || $food->carbohydrates == $realResultCarbohydrates - $i
        //                 ) {

        //                     // Check if the food is already in the recommendations
        //                     if (!in_array($food, $recommendationFoods)) {
        //                         $recommendationFoods[] = $food;
        //                     }

        //                     // If the recommendations array already has 5 foods, stop the loop
        //                     if (count($recommendationFoods) == 3) {
        //                         break 3;
        //                     }

        //                     continue;
        //                 }
        //             }
        //         }
        //     }
        //     $recommendations[] = $recommendationFoods;
        // }

        // // dd($recommendations);

        // // Filter Data with Best Result
        // // $foods = $population->whereIn('id', $bestResult);

        // // $geneticAlgorithm = new GeneticAlgoritm($data, $target, $population, $generationLimit);

        // // Return a View
        // return view('pages.user.food-recommendation.index', compact('childdren', 'foods', 'data', 'recommendations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $childdren)
    {
        // Debugging
        // dd($childdren);

        // Get User/Children Data
        $children = \App\Models\Children::where('slug', $childdren)->first();
        // dd($children);

        // Food Group 
        $foodGroups = \App\Models\FoodGroup::all();

        // Return a View
        return view('pages.user.food-recommendation.create', compact('children', 'foodGroups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(string $childdren, Request $request)
    {
        // Debugging
        // dd($childdren, $request->all());

        // Get User/Children Data
        $children = \App\Models\Children::where('slug', $childdren)->first();
        // dd($children);
        // Validation of Form Data 
        $request->validate(
            [
                'weight' => 'required|numeric',
                'height' => 'required|numeric',
                'type' => 'required|string',
                'food_group' => 'required|numeric',
            ],
            [
                'weight.required' => 'Berat Badan harus diisi',
                'weight.numeric' => 'Berat Badan harus berupa angka',
                'height.required' => 'Tinggi Badan harus diisi',
                'height.numeric' => 'Tinggi Badan harus berupa angka',
                'type.required' => 'Tipe Anak harus diisi',
                'type.string' => 'Tipe Anak harus berupa angka',
                'food_group.required' => 'Kelompok Makanan harus diisi',
                'food_group.numeric' => 'Kelompok Makanan harus berupa angka',
            ]
        );

        // String to Integer
        // $request->food_group = (int) $request->food_group;


        // Harris-Benedict Equation Target
        $weight = (int) $request->weight; // Weight in kg
        $height = (int) $request->height; // Height in cm
        // Hitung umur dalam bulan (1 tahun = 12 bulan)
        $birthdate = $children->birthdate; // Age in months
        // Kurangi dari Hari ini
        $age = date_diff(date_create($birthdate), date_create('now'))->format('%y');
        $month = date_diff(date_create($birthdate), date_create('now'))->format('%m');
        $age = ($age * 12) + $month;
        $age = $age; // Age in months
        // dd($age);
        $gender = $children->gander;
        // dd($gender);

        // Type Identification
        if ($request->type == 'Aktif') {
            $activityLevel = 1.5;
        } elseif ($request->type == 'Pasif') {
            $activityLevel = 1.0;
        } else {
            $activityLevel = 0.8;
        }
        // Harris-Benedict
        $target = new \App\Models\Algoritm\HarrisBenedict($gender, $weight, $height, $age, $activityLevel);
        // dd($result);


        // Harris-Benedict Equation Now
        $weight = $children->weight; // Weight in kg
        $height = $children->height; // Height in cm
        // Hitung umur dalam bulan (1 tahun = 12 bulan)
        $birthdate = $children->birthdate; // Age in months
        // Kurangi dari Hari ini
        $age = date_diff(date_create($birthdate), date_create('now'))->format('%y');
        $month = date_diff(date_create($birthdate), date_create('now'))->format('%m');
        $age = ($age * 12) + $month;
        $age = $age; // Age in months
        // dd($age);
        $gender = $children->gander;
        $activityLevel = 1.5; // 1.5 = Active | 1.2 = Moderate | 1.0 = Sedentary | 0.8 = Very Sedentary | 2.0 = Very Active | 2.2 = Extremely Active | 2.4 = Professional Athlete | 2.6 = Olympic Athlete | 2.8 = Super Human | 3.0 = God

        // Harris-Benedict
        $now = new \App\Models\Algoritm\HarrisBenedict($gender, $weight, $height, $age, $activityLevel);
        // dd($target, $now);


        // 1. Population
        // Select Population
        $filter = $request->food_group;
        switch ($filter) {
            case (isset($filter) || $filter != null || $filter != 'all' || $filter != ''):
                // Select FoodGroup = AA
                $foodGroup = \App\Models\FoodGroup::where('code_name', $filter)->first();

                // Select Population
                if ($foodGroup != null) {
                    $population = \App\Models\Food::where('food_group_id', $foodGroup->id)->get();
                } else {
                    $population = \App\Models\Food::all();
                }
                break;

            default:
                // 0-6 Months
                // Get Foods Data from Database in energy < 550, protein < 12, fat < 34, carbohydrate < 58
                // $population = \App\Models\Food::where('energy', '<', 550)->where('protein', '<', 12)->where('fat', '<', 34)->where('carbohydrates', '<', 58)->get();

                // 7-12 Months
                // Get Foods Data from Database in energy < 725, protein < 18, fat < 36, carbohydrate < 82
                // $population = \App\Models\Food::where('energy', '<', 725)->where('protein', '<', 18)->where('fat', '<', 36)->where('carbohydrates', '<', 82)->get();

                // 1-3 Years
                // Get Foods Data from Database in energy < 1125, protein < 26, fat < 44, carbohydrate < 155
                // $population = \App\Models\Food::where('energy', '<', 1125)->where('protein', '<', 26)->where('fat', '<', 44)->where('carbohydrates', '<', 155)->get();

                // 4-6 Years
                // Get Foods Data from Database in energy < 1600, protein < 35, fat < 62, carbohydrate < 220
                // $population = \App\Models\Food::where('energy', '<', 1600)->where('protein', '<', 35)->where('fat', '<', 62)->where('carbohydrates', '<', 220)->get();

                // 7-9 Years
                // Get Foods Data from Database in energy < 1850, protein < 49, fat < 72, carbohydrate < 254
                // $population = \App\Models\Food::where('energy', '<', 1850)->where('protein', '<', 49)->where('fat', '<', 72)->where('carbohydrates', '<', 254)->get();

                $population = \App\Models\Food::all();

                break;
        }

        // Foods
        $foods = \App\Models\Food::all();

        // Hitung nilai maksimum dan minimum dari setiap nutrisi
        $maxEnergy = $population->max('energy');
        $minEnergy = $population->min('energy');
        $maxProtein = $population->max('protein');
        $minProtein = $population->min('protein');
        $maxFat = $population->max('fat');
        $minFat = $population->min('fat');
        $maxCarbohydrates = $population->max('carbohydrates');
        $minCarbohydrates = $population->min('carbohydrates');

        // Range
        $rangeEnergy = $maxEnergy - $minEnergy;
        $rangeProtein = $maxProtein - $minProtein;
        $rangeFat = $maxFat - $minFat;
        $rangeCarbohydrates = $maxCarbohydrates - $minCarbohydrates;

        // Satuan Range (1) = 1%
        $satuanEnergy = $rangeEnergy / 10;
        $satuanProtein = $rangeProtein / 10;
        $satuanFat = $rangeFat / 10;
        $satuanCarbohydrates = $rangeCarbohydrates / 10;

        // Set Data
        $data = [
            'population' => $population,
            'target' => $target,
            'now' => $now,
            'maxEnergy' => $maxEnergy,
            'minEnergy' => $minEnergy,
            'maxProtein' => $maxProtein,
            'minProtein' => $minProtein,
            'maxFat' => $maxFat,
            'minFat' => $minFat,
            'maxCarbohydrates' => $maxCarbohydrates,
            'minCarbohydrates' => $minCarbohydrates,
            'rangeEnergy' => $rangeEnergy,
            'rangeProtein' => $rangeProtein,
            'rangeFat' => $rangeFat,
            'rangeCarbohydrates' => $rangeCarbohydrates,
            'satuanEnergy' => $satuanEnergy,
            'satuanProtein' => $satuanProtein,
            'satuanFat' => $satuanFat,
            'satuanCarbohydrates' => $satuanCarbohydrates,
        ];

        // Set Target
        $resultEnergy = (($target->result['energy'] - $data['minEnergy']) / $data['satuanEnergy']);
        $resultEnergy = round($resultEnergy) > 10 ? 10 : round($resultEnergy);
        $resultProtein = (($target->result['protein'] - $data['minProtein']) / $data['satuanProtein']);
        $resultProtein = round($resultProtein) > 10 ? 10 : round($resultProtein);
        $resultFat = (($target->result['fat'] - $data['minFat']) / $data['satuanFat']);
        $resultFat = round($resultFat) > 10 ? 10 : round($resultFat);
        $resultCarbohydrates = (($target->result['carbs'] - $data['minCarbohydrates']) / $data['satuanCarbohydrates']);
        $resultCarbohydrates = round($resultCarbohydrates) > 10 ? 10 : round($resultCarbohydrates);

        // dd($resultEnergy, $target->result['energy'], $data['minEnergy'], $data['satuanEnergy']);
        // GeneticAlgorithm
        // Contoh penggunaan
        $populationSize = 100;
        $generations = 100;
        $mutationRate = 100; // Persentase peluang mutasi
        $target = $resultEnergy + $resultProtein + $resultFat + $resultCarbohydrates; // Target

        // Loop 5 Kali untuk Rekomendasi Makanan pada 1 Hari
        $recommendations = [];
        for ($f = 0; $f < 2; $f++) {
            for ($i = 0; $i < 100; $i++) {
                $bestResult = [];
                $geneticAlgorithm = new GeneticAlgoritm($populationSize, $generations, $mutationRate, $target);
                $bestResult = $geneticAlgorithm->runGeneticAlgorithm();
                // dd($bestResult);

                // Count Real Result
                $realResultEnergy = $data['minEnergy'] + ($bestResult[0] * $data['satuanEnergy']);
                $realResultProtein = $data['minProtein'] + ($bestResult[1] * $data['satuanProtein']);
                $realResultFat = $data['minFat'] + ($bestResult[2] * $data['satuanFat']);
                $realResultCarbohydrates = $data['minCarbohydrates'] + ($bestResult[3] * $data['satuanCarbohydrates']);

                // Debugging
                // dd($realResultEnergy, $realResultProtein, $realResultFat, $realResultCarbohydrates);

                $recommendationFoods = [];
                for ($i = 0; $i < 250; $i++) {
                    foreach ($foods as $index => $food) {
                        // dd($food);
                        // Cek apakah makanan memiliki nilai protein, lemak, dan karbohidrat yang sesuai dengan hasil algoritma genetika
                        if (
                            $food->energy == $realResultEnergy || $food->energy == $realResultEnergy + $i || $food->energy == $realResultEnergy - $i
                            && $food->protein == $realResultProtein || $food->protein == $realResultProtein + $i || $food->protein == $realResultProtein - $i
                            && $food->fat == $realResultFat || $food->fat == $realResultFat + $i || $food->fat == $realResultFat - $i
                            && $food->carbohydrates == $realResultCarbohydrates || $food->carbohydrates == $realResultCarbohydrates + $i || $food->carbohydrates == $realResultCarbohydrates - $i
                        ) {

                            // Check if the food is already in the recommendations
                            if (!in_array($food, $recommendationFoods)) {
                                // Count Percentage Nutrisi
                                $percentageEnergy = ($food->energy / $realResultEnergy) * 100;
                                $percentageProtein = ($food->protein / $realResultProtein) * 100;
                                $percentageFat = ($food->fat / $realResultFat) * 100;
                                $percentageCarbohydrates = ($food->carbohydrates / $realResultCarbohydrates) * 100;

                                // Push Data to Food
                                $food->percentageEnergy = $percentageEnergy;
                                $food->percentageProtein = $percentageProtein;
                                $food->percentageFat = $percentageFat;
                                $food->percentageCarbohydrates = $percentageCarbohydrates;

                                // Average Percentage
                                $food->averagePercentage = ($percentageEnergy + $percentageProtein + $percentageFat + $percentageCarbohydrates) / 4;

                                // Kesimpulan Nutrisi Makanan (Sangat Baik, Baik, Cukup)
                                if ($food->averagePercentage >= 90) {
                                    $food->conclusion = 'Sangat Baik';
                                } elseif ($food->averagePercentage >= 70) {
                                    $food->conclusion = 'Baik';
                                } else {
                                    $food->conclusion = 'Cukup Baik';
                                }

                                $recommendationFoods[] = $food;
                            }

                            // If the recommendations array already has 5 foods, stop the loop
                            if (count($recommendationFoods) == 5) {
                                break 3;
                            }

                            continue;
                        }
                    }
                }
            }
            $recommendations[] = $recommendationFoods;
        }



        // dd($recommendations);

        // Loop Recommendations
        foreach ($recommendations as $index => $recommendation) {
            // Time 
            // Index 0 = Breakfast
            // Index 1 = Lunch
            // Index 2 = Dinner
            if ($index == 0) {
                $time = '06:00:00';
                $note = 'Sarapan';
            } elseif ($index == 1) {
                $time = '12:00:00';
                $note = 'Makan Siang';
            } else {
                $time = '18:00:00';
                $note = 'Makan Malam';
            }

            foreach ($recommendation as $food) {
                // dd($food);
                // Save to Database
                $foodRecommendation = new \App\Models\FoodRecommendation;
                $foodRecommendation->child_id = $children->id;
                $foodRecommendation->food_id = $food->id;
                $foodRecommendation->time = $time;
                $foodRecommendation->notes = $note;
                $foodRecommendation->save();
            }
        }

        // Get All Food Recommendation Data
        $foodRecommendations = \App\Models\FoodRecommendation::where('child_id', $children->id)->paginate(10);

        // Return a View
        return view('pages.user.food-recommendation.index', compact('children', 'foods', 'data', 'recommendations', 'foodRecommendations'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $childdren, string $slug)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $childdren, string $slug)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $childdren, Request $request, string $slug)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $childdren, string $slug)
    {
        //
    }
}
