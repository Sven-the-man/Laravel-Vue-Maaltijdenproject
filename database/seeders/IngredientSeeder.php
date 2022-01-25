<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ingredient::create(['name' => 'Aardappelen']);
        Ingredient::create(['name' => 'Uien']);
        Ingredient::create(['name' => 'Sla']);
        Ingredient::create(['name' => 'Rijst']);
        Ingredient::create(['name' => 'Meel']);
        Ingredient::create(['name' => 'Knoflook']);
        Ingredient::create(['name' => 'Rundvlees']);
        Ingredient::create(['name' => 'Varkensvlees']);
        Ingredient::create(['name' => 'Paprika']);
        Ingredient::create(['name' => 'Tomaten']);
    }
}
