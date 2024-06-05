<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Set API Routes for User
Route::get('/DKBM-Indonesia', function () {
    // Load data from public/build/data/DKBM-Indonesia.json
    $link = public_path('/build/data/DKBM-Indonesia.json');

    // Json File get contents from the link
    $json = file_get_contents($link);

    // Clean the JSON
    // Remove BOM
    $json = preg_replace('/\x{FEFF}/u', '', $json);
    // Remove UTF-8 BOM
    $json = preg_replace('/^[\x{FEFF}]+/u', '', $json);

    // Decode JSON
    $data = json_decode($json, true);

    // Return the data
    return response()->json($data);
});
