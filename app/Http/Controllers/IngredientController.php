<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserIngredientsRequest;
use App\Http\Resources\IngredientResource;
use App\Models\Ingredient;
use App\Models\User;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function index()
    {
        return IngredientResource::collection(Ingredient::all());
    }

    public function store(StoreUserIngredientsRequest $request) {

       
        $validated = $request->validated();
        dd($validated);

        User::update($validated)->ingredients()->sync($request->ingredients);


    }
}
