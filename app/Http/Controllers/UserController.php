<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserIngredientsRequest;
use App\Http\Resources\IngredientResource;
use App\Http\Resources\UserResource;
use App\Models\Ingredient;
use App\Models\User;
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
}

