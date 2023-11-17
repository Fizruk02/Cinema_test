<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Films;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class FilmsController extends Controller
{
    public function show()
    {
        $admin = false;
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->isAdmin()) {
                $admin = true;
            }
        }

        $films = Films::where('status', 1)->orderBy('date')->get();
        return view('film.index', compact('films', 'admin'));
    }
}
