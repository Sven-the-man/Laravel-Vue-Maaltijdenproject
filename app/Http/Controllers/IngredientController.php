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

    public function store(Request $request) {
        dd(Auth::user()->id);
         // This doesn't seem to work, why?   
        // Auth::user()->ingredients()->attach($request);

        dd("Package received");
    }
}
