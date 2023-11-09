<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Films;

class FilmsController extends Controller
{
    public function show()
    {
        $films = Films::all()->where('status', '=', 1);
        return view("main", compact('films'));
    }
}
