<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = [

        'name', 
        'category'
    ];
    function meals() {
        return $this->belongsToMany(Meal::class);
    }

    function user() {
        return $this->belongsToMany(User::class);
    }
}
