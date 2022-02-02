<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMealRequest;
use App\Http\Resources\MealResource;
use Illuminate\Http\File;
use App\Models\Meal;
use Illuminate\Support\Facades\Storage;

class MealController extends Controller
{
    public function index()
    {
        return MealResource::collection(Meal::orderBy('created_at', 'desc')->get());
    }

 
    public function store(StoreMealRequest $request)
        {
            $validated = $request->validated();
    
            $validated['image_name'] = Storage::put('images', new File($validated['image']), 'public');
    
            Meal::create($validated)->ingredients()->attach(explode(',', $validated['ingredient_id']));
    
        }


    }

