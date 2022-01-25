<?php

namespace App\Http\Controllers;


use App\Http\Resources\MealResource;
use App\Models\Meal;




class MealController extends Controller
{
    public function index()
    {
        return MealResource::collection(Meal::orderBy('id')->get());
    }
}
