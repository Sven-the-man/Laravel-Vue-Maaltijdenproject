<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Resources\IngredientResource;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function index()
    {
        return IngredientResource::collection(Ingredient::all());
    }

    public function update(Request $request)
    {


        Auth::user()->ingredients()->sync($request->get('ingredient_ids'));

        return Auth::user()->ingredients;
    }
}
