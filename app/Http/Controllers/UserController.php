<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return new UserResource(Auth::user());
    }

    public function getUserIngredients()
    {
        return new UserResource(Auth::user());
    }

    public function update(Request $request)
    {
        Auth::user()->ingredients()->sync($request->get('ingredient_ids'));

        return new UserResource(Auth::user());
    }


    public function makeUserMeal(Request $request)
    {
        Auth::user()->meals()->attach($request->get('meal_id'));
        return new UserResource(Auth::user());
    }
}
