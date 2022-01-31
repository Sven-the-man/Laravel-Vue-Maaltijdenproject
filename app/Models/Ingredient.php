<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    function meals() {
        $this->belongsToMany(Meal::class);
    }

    function user() {
        $this->belongsToMany(User::class);
    }
}
