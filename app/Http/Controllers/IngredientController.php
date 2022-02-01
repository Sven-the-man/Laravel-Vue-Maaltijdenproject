<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
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

    public function store(StoreUserIngredientsRequest $request, User $user) {

       
        $validated = $request->validated();
         // This doesn't seem to work, why?   
        // $user->update($validated)->ingredients()->attach(explode(',', $validated['category_id']));

        dd("Package received");
    }
}
