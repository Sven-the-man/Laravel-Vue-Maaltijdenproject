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

    public function update(Request $request) {
       
        
        User::find(Auth::user()->id)->ingredients()->attach($request);
       
       
    }
}
