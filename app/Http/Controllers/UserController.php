<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMakeUserMealRequest;
use App\Http\Resources\IngredientResource;
use App\Http\Resources\UserResource;
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

    
        return new UserResource(Auth::user());
    }

    public function update(Request $request)
    {

       

        Auth::user()->ingredients()->sync($request->get('ingredient_ids'));

        return new UserResource(Auth::user());

    }


    public function makeUserMeal(StoreMakeUserMealRequest $request) {

        $validated = $request->validated();
        dd($validated);
        Auth::user()->meals()->attach($validated->get('meal_id'));

    }
}

