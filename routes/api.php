<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MealController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\UserController;


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
//meal api routes
Route::get('/meals', [MealController::class, 'index']);
Route::get('/meals/{meal}', [MealController::class, 'show']);
Route::post('/meals/create', [MealController::class, 'store']);
Route::post('meals/{meal}/update', [MealController::class, 'update']);
Route::post('meals/remove', [mealController::class, 'destroy']);

// ingredient routes
Route::get('ingredients', [IngredientController::class, 'index']);
Route::post('ingredients/create', [IngredientController::class, 'store']);
Route::post('ingredients/{ingredient}/update', [IngredientController::class, 'update']);

//user ingredient routes
Route::get('user/ingredients', [UserController::class, 'getUserIngredients']);
Route::post('user/ingredients/update', [UserController::class, 'update']);
Route::get('/user/meals', [MealController::class, 'userMeals']);

//authentication routes
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::get('/logout', [AuthenticatedSessionController::class, 'destroy']);