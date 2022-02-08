<?php

namespace App\Http\Controllers;


use App\Http\Requests\UpdateMealRequest;
use App\Http\Requests\StoreMealRequest;
use App\Http\Resources\MealResource;
use App\Http\Models\User;
use App\Models\Ingredient;
use Illuminate\Http\File;
use App\Models\Meal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function update(UpdateMealRequest $request, Meal $meal)
    {

        dd($request);
        $validated = $request->validated();

        $validated['image_name'] = Storage::put('images', new File($validated['image']), 'public');

        $meal->update($validated);

        dd($meal);
       
        return MealResource::collection(Meal::all());
        
        
    }

    public function destroy(Request $request)
    {

        $meal = Meal::find($request['mealId']);

        $meal->ingredients()->detach();

        $meal->delete();

        return MealResource::collection(Meal::all());
    }

    public function show(Meal $meal)
    {

        return response()->json(['meal' => $meal->load('ingredients')]);
    }


    public function userMeals()
    {
        
        return MealResource::collection(Meal::orderBy('created_at', 'desc')->get());
        
    }
}
