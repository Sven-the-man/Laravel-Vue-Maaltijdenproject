<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;   

    protected $fillable = [
        'name',
        'description',
        'image_name',     
    ];

    function ingredients() {
        return $this->belongsToMany(Ingredient::class);
    }

    function user() {
        return $this->belongsToMany(User::class);
    }

}
