<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIngredientRequest;
use App\Http\Resources\IngredientResource;
use App\Http\Requests\UpdateIngredientRequest;

use App\Models\Ingredient;

class IngredientController extends Controller
{


    public function index()
    {
        return IngredientResource::collection(Ingredient::all()->sortByDesc("created_at"));
    }


    public function store(StoreIngredientRequest $request)
    {

        $validated = $request->validated();

        $validated['category'] = 'Onbekend';

        Ingredient::create($validated);

        return IngredientResource::collection(Ingredient::all()->sortByDesc("created_at"));
    }

    public function update(UpdateIngredientRequest $request)
    {
        // TODO :: RouteMmodelBinding
        $validated = $request->validated();

        $ingredient = Ingredient::find($request->id);

        $ingredient->update($validated);

        return IngredientResource::collection(Ingredient::all()->sortByDesc("created_at"));
    }
}
