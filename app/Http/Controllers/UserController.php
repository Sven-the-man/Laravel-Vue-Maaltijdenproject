<?php

namespace App\Http\Controllers;

use App\Http\Resources\IngredientResource;
use App\Models\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        
        return IngredientResource::collection(Ingredient::all());
    }

    public function getUserIngredients() {

    
        return Auth::user()->ingredients;
    }

    public function update(Request $request)
    {

        Auth::user()->ingredients()->sync($request->get('ingredient_ids'));

        return Auth::user()->ingredients;
    }

    public function makeMeal(Request $request) {

        Auth::user()->meals()->attach($request->get('meal_id'));

        return Auth::user()->meals;

    }
}

