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
        Ingredient::create(['name' => 'Aardappelen', 'category' => 'Groenten']);
        Ingredient::create(['name' => 'Uien', 'category' => 'Groenten']);
        Ingredient::create(['name' => 'Sla', 'category' => 'Groenten']);
        Ingredient::create(['name' => 'Rijst', 'category' => 'Groenten']);
        Ingredient::create(['name' => 'Paprika', 'category' => 'Groenten']);
        Ingredient::create(['name' => 'Tomaten', 'category' => 'Groenten']);
       
        Ingredient::create(['name' => 'Knoflook', 'category' => 'Kruiden']);
        Ingredient::create(['name' => 'Gember', 'category' => 'Kruiden']);
        Ingredient::create(['name' => 'Suiker', 'category' => 'Kruiden']);

        Ingredient::create(['name' => 'Rundvlees', 'category' => 'Vlees']);
        Ingredient::create(['name' => 'Varkensvlees', 'category' => 'Vlees']);
        Ingredient::create(['name' => 'Kippenvlees', 'category' => 'Vlees']);
        Ingredient::create(['name' => 'Lamsvlees', 'category' => 'Vlees']);

        Ingredient::create(['name' => 'Ananas', 'category' => 'Fruit']);
        Ingredient::create(['name' => 'Sinaasappels', 'category' => 'Fruit']);
        Ingredient::create(['name' => 'Appels', 'category' => 'Fruit']);

        Ingredient::create(['name' => 'Ketchup', 'category' => 'Saus']);
        Ingredient::create(['name' => 'Mayonaise', 'category' => 'Saus']);
        Ingredient::create(['name' => 'Curry', 'category' => 'Saus']);




        
    }
}
