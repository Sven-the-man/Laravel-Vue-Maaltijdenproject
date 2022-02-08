<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIngredientRequest;
use App\Http\Resources\IngredientResource;
use App\Http\Resources\UpdateIngredientRequest;

use App\Models\Ingredient;

class IngredientController extends Controller
{

    
    public function index()
    {
        return IngredientResource::collection(Ingredient::all()->sortByDesc("updated_at"));
        
    }


    public function store(StoreIngredientRequest $request)
    {
        
        $validated = $request->validated();

        $validated['category'] = 'pinda';

        Ingredient::create($validated);

        return IngredientResource::collection(Ingredient::all()->sortByDesc("updated_at"));

    }

    public function update(UpdateIngredientRequest $request, Ingredient $ingredient)
    {

        $validated = $request->validated();

        dd($validated);

        $ingredient->update($validated);

        return IngredientResource::collection(Ingredient::all()->sortByDesc("updated_at"));
    }
}
