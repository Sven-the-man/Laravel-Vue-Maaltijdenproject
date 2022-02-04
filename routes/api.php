<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MealController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\IngredientController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/meals', [MealController::class, 'index']);
Route::post('meals', [MealController::class, 'store']);

Route::get('/my_ingredients', [IngredientController::class, 'index']);
Route::get('/ingredients', [IngredientController::class, 'index']);

Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::get('/logout', [AuthenticatedSessionController::class, 'destroy']);

Route::post('/ingredients', [IngredientController::class, 'update']);

Route::post('remove-meal', [mealController::class, 'destroy']);

Route::post('update-meal', [MealController::class, 'update']);