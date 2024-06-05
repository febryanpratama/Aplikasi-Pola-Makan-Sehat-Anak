<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// For Guest an Not Authentication
Route::get('/', function () {
    // return view('welcome');

    // Get All Food
    $foods = App\Models\Food::paginate(5);
    return view('pages.guest.home.index', compact('foods'));
})->name('welcome');

// Food For guest
Route::get('/food', function () {
    // Get All Food
    $foods = App\Models\Food::paginate(10);

    // Total Food
    $total = App\Models\Food::count();

    return view('pages.guest.food.index', compact('foods', 'total'));
})->name('guest.food');

// Food Detail
Route::get('/food/{food}', function ($food) {
    // Get Food
    $food = App\Models\Food::find($food);

    return view('pages.guest.food.show', compact('food'));
})->name('guest.food.show');

// Food Search
Route::post('/food/search', function () {
    // Get All Food
    $foods = App\Models\Food::where('name', 'like', '%' . request('search') . '%')->paginate(10);

    // Total Food
    $total = App\Models\Food::where('name', 'like', '%' . request('search') . '%')->count();

    return view('pages.guest.food.index', compact('foods', 'total'));
})->name('guest.food.search');

// About
Route::get('/about', function () {
    return view('pages.guest.about.index');
})->name('guest.about');

// Contact
Route::get('/contact', function () {
    return view('pages.guest.contact.index');
})->name('guest.contact');

// For Guest on Authentication
require __DIR__ . '/auth.php';

// For User an Authentication
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['verified'])->name('dashboard');

    // Begin Users Handling
    Route::prefix('/user')->name('user')->middleware(['user'])->group(function () {
        // Users
        Route::prefix('/users')->name('.users')->controller(\App\Http\Controllers\User\UserController::class)->group(function () {
            Route::get('/', 'index')->name('.index');
            Route::get('/create', 'create')->name('.create');
            Route::post('/', 'store')->name('.store');
            Route::get('/{user}/edit', 'edit')->name('.edit');
            Route::patch('/{user}', 'update')->name('.update');
            Route::delete('/{user}', 'destroy')->name('.destroy');
        });

        // Children
        Route::prefix('/children')->name('.children')->controller(\App\Http\Controllers\User\ChildrenController::class)->group(function () {
            Route::get('/', 'index')->name('.index');
            Route::get('/create', 'create')->name('.create');
            Route::post('/', 'store')->name('.store');
            Route::get('/{children}/edit', 'edit')->name('.edit');
            Route::patch('/{children}', 'update')->name('.update');
            Route::delete('/{children}', 'destroy')->name('.destroy');
        });

        // Food Recommendation
        Route::prefix('/children/{children}/food-recommendation')->name('.food_recommendation')->controller(\App\Http\Controllers\User\FoodRecommendationController::class)->group(function () {
            Route::get('/', 'index')->name('.index');
            Route::get('/create', 'create')->name('.create');
            Route::post('/', 'store')->name('.store');
            Route::get('/{food_recommendation}/edit', 'edit')->name('.edit');
            Route::patch('/{food_recommendation}', 'update')->name('.update');
            Route::delete('/{food_recommendation}', 'destroy')->name('.destroy');
        });

        // Food
        Route::prefix('/food')->name('.food')->controller(\App\Http\Controllers\User\FoodController::class)->group(function () {
            Route::get('/', 'index')->name('.index');
            Route::get('/create', 'create')->name('.create');
            Route::post('/', 'store')->name('.store');
            Route::get('/{food}/edit', 'edit')->name('.edit');
            Route::patch('/{food}', 'update')->name('.update');
            Route::delete('/{food}', 'destroy')->name('.destroy');
        });
    });
    // End Users Handling

    // Begin Admin Handling
    Route::prefix('/admin')->name('admin')->middleware(['auth', 'admin'])->group(function () {
        // Admin
        Route::prefix('/admin')->name('.admin')->controller(\App\Http\Controllers\Admin\AdminController::class)->group(function () {
            Route::get('/', 'index')->name('.index');
            Route::get('/create', 'create')->name('.create');
            Route::post('/', 'store')->name('.store');
            Route::get('/{admin}/edit', 'edit')->name('.edit');
            Route::patch('/{admin}', 'update')->name('.update');
            Route::delete('/{admin}', 'destroy')->name('.destroy');
        });

        // Food Group
        Route::prefix('/food-group')->name('.food_group')->controller(\App\Http\Controllers\Admin\FoodGroupController::class)->group(function () {
            Route::get('/', 'index')->name('.index');
            Route::get('/create', 'create')->name('.create');
            Route::post('/store', 'store')->name('.store');
            Route::get('/{food_group}/edit', 'edit')->name('.edit');
            Route::patch('/{food_group}', 'update')->name('.update');
            Route::delete('/{food_group}', 'destroy')->name('.destroy');

            // Customized
            Route::post('/', 'search')->name('.search');
            Route::post('/store/image', 'image')->name('.image');
        });

        // Food
        Route::prefix('/food')->name('.food')->controller(\App\Http\Controllers\Admin\FoodController::class)->group(function () {
            Route::get('/', 'index')->name('.index');
            Route::get('/create', 'create')->name('.create');
            Route::post('/store', 'store')->name('.store');
            Route::get('/{food}/edit', 'edit')->name('.edit');
            Route::patch('/{food}', 'update')->name('.update');
            Route::delete('/{food}', 'destroy')->name('.destroy');

            // Customized
            Route::post('/', 'search')->name('.search');
        });

        // Boys || Anak Laki-Laki
        Route::prefix('/boys')->name('.boys')->controller(\App\Http\Controllers\Admin\BoysController::class)->group(function () {
            Route::get('/', 'index')->name('.index');
            Route::get('/create', 'create')->name('.create');
            Route::post('/', 'store')->name('.store');
            Route::get('/{boys}/edit', 'edit')->name('.edit');
            Route::patch('/{boys}', 'update')->name('.update');
            Route::delete('/{boys}', 'destroy')->name('.destroy');

            // Statistic
            Route::prefix('/statistic')->name('.statistic')->controller(\App\Http\Controllers\Admin\BoysStatisticController::class)->group(function () {
                Route::get('/', 'index')->name('.index');
                Route::get('/create', 'create')->name('.create');
                Route::post('/', 'store')->name('.store');
                Route::get('/{statistic}/edit', 'edit')->name('.edit');
                Route::patch('/{statistic}', 'update')->name('.update');
                Route::delete('/{statistic}', 'destroy')->name('.destroy');
            });

            // Weight Standar
            Route::prefix('/weight')->name('.weight')->controller(\App\Http\Controllers\Admin\BoysStandartWeightController::class)->group(function () {
                Route::get('/', 'index')->name('.index');
                Route::get('/create', 'create')->name('.create');
                Route::post('/store', 'store')->name('.store');
                Route::get('/{weight}/edit', 'edit')->name('.edit');
                Route::patch('/{weight}', 'update')->name('.update');
                Route::delete('/{weight}', 'destroy')->name('.destroy');

                // Customized
                Route::post('/', 'search')->name('.search');
            });

            // Height Standar
            Route::prefix('/height')->name('.height')->controller(\App\Http\Controllers\Admin\BoysStandartHeightController::class)->group(function () {
                Route::get('/', 'index')->name('.index');
                Route::get('/create', 'create')->name('.create');
                Route::post('/', 'store')->name('.store');
                Route::get('/{height}/edit', 'edit')->name('.edit');
                Route::patch('/{height}', 'update')->name('.update');
                Route::delete('/{height}', 'destroy')->name('.destroy');

                // Customized
                Route::post('/', 'search')->name('.search');
            });
        });

        // Girls || Anak Perempuan
        Route::prefix('/girls')->name('.girls')->controller(\App\Http\Controllers\Admin\GirlsController::class)->group(function () {
            Route::get('/', 'index')->name('.index');
            Route::get('/create', 'create')->name('.create');
            Route::post('/', 'store')->name('.store');
            Route::get('/{girls}/edit', 'edit')->name('.edit');
            Route::patch('/{girls}', 'update')->name('.update');
            Route::delete('/{girls}', 'destroy')->name('.destroy');

            // Statistic
            Route::prefix('/statistic')->name('.statistic')->controller(\App\Http\Controllers\Admin\BoysStatisticController::class)->group(function () {
                Route::get('/', 'index')->name('.index');
                Route::get('/create', 'create')->name('.create');
                Route::post('/', 'store')->name('.store');
                Route::get('/{statistic}/edit', 'edit')->name('.edit');
                Route::patch('/{statistic}', 'update')->name('.update');
                Route::delete('/{statistic}', 'destroy')->name('.destroy');
            });

            // Weight Standar
            Route::prefix('/weight')->name('.weight')->controller(\App\Http\Controllers\Admin\GirlsStandartWeightController::class)->group(function () {
                Route::get('/', 'index')->name('.index');
                Route::get('/create', 'create')->name('.create');
                Route::post('/', 'store')->name('.store');
                Route::get('/{weight}/edit', 'edit')->name('.edit');
                Route::patch('/{weight}', 'update')->name('.update');
                Route::delete('/{weight}', 'destroy')->name('.destroy');
            });

            // Height Standar
            Route::prefix('/height')->name('.height')->controller(\App\Http\Controllers\Admin\GirlsStandartHeightController::class)->group(function () {
                Route::get('/', 'index')->name('.index');
                Route::get('/create', 'create')->name('.create');
                Route::post('/', 'store')->name('.store');
                Route::get('/{height}/edit', 'edit')->name('.edit');
                Route::patch('/{height}', 'update')->name('.update');
                Route::delete('/{height}', 'destroy')->name('.destroy');
            });
        });
    });
    // End Admin Handling

    // Profile || All Users
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Route for Testing
Route::get('/test', function () {
    return ('test');
});
