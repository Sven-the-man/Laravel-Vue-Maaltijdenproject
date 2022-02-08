<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['name' => 'admin', 'email' => 'admin@admin.com', 'password' => bcrypt('password')]);

        $users = User::factory(50)->create();

        $ingredients = Ingredient::count();
    
        $users->each(function (User $user) use ($ingredients) {
            for ($i = 0; $i < rand(1, $ingredients); $i++) {
                $user->ingredients()->syncWithoutDetaching(rand(5, $ingredients));
                }
            });

        
        }


    }