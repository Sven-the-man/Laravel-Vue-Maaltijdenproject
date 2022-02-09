<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMakeRequest;
use App\Models\Make;
use Illuminate\Support\Facades\Auth;

class MakeController extends Controller
{
    public function store(StoreMakeRequest $request) {
        
        $validated = $request->validated();

        $validated['user_id'] = Auth::user()->id;

        Make::create($validated);

    }
}
