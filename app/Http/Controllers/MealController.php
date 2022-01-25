<?php

namespace App\Http\Controllers;


use App\Http\Resources\MealResource;
use App\Models\Meal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;



class MealController extends Controller
{
    public function index()
    {
        return MealResource::collection(Meal::orderBy('id')->get());
    }
}
