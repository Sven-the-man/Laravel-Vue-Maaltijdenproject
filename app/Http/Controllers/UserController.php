<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Http\Resources\MealResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ingredient;
use App\Models\Meal;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(['user' => new UserResource(Auth::user()), 'meals' => MealResource::collection(Meal::all()), 'ingredients' => Ingredient::all()]);
    }

    public function getUserIngredients()
    {
        return response()->json(['user' => new UserResource(Auth::user()), 'meals' => MealResource::collection(Meal::all()), 'ingredients' => Ingredient::all()]);
    }

    public function update(Request $request)
    {
        Auth::user()->ingredients()->sync($request->get('ingredient_ids'));

        return response()->json(['user' => new UserResource(Auth::user()), 'meals' => MealResource::collection(Meal::all()), 'ingredients' => Ingredient::all()]);
    }


    public function makeUserMeal(Request $request)
    {
        Auth::user()->meals()->attach($request->get('meal_id'));
        return response()->json(['user' => new UserResource(Auth::user()), 'meals' => MealResource::collection(Meal::all()), 'ingredients' => Ingredient::all()]);
    }
}
