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

        $films = Films::where('status', 1)
            ->orderBy('date', 'desc')
            ->get();

        $filteredFilms = [];
        $previousFilmEndTime = null;

        foreach ($films as $film) {
            $currentFilmStartTime = Carbon::parse($film->date);

            if ($previousFilmEndTime === null || $previousFilmEndTime->diff($currentFilmStartTime)->i >= 30) {
                $filteredFilms[] = $film;
                $previousFilmEndTime = $currentFilmStartTime->addMinutes($film->duration);
            }
        }

        return view('films_card', compact('filteredFilms', 'admin'));
    }
}
