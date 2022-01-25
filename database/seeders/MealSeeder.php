<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\Meal;
use Illuminate\Database\Seeder;

class MealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $meals = Meal::factory(500)->create();

        $ingredients = Ingredient::count();
    
        $meals->each(function (Meal $meal) use ($ingredients) {
            for ($i = 0; $i < rand(1, $ingredients); $i++) {
                $meal->ingredients()->syncWithoutDetaching(rand(1, $ingredients));
                }
            });
        }
    }

