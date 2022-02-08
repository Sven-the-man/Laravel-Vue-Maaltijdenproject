<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIngredientRequest;
use App\Http\Resources\IngredientResource;
use App\Models\Ingredient;

class IngredientController extends Controller
{

    
    public function index()
    {
        return IngredientResource::collection(Ingredient::orderBy('created_at', 'desc'));
       
    }


    public function store(StoreIngredientRequest $request)
    {
        
        $validated = $request->validated();
        $validated['category'] = 'pinda';
        Ingredient::create($validated);
        return IngredientResource::collection(Ingredient::orderBy('created_at', 'desc'));
    
        

    }
}
