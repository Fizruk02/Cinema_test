<?php

namespace App\Services\Film;

use App\Models\Films;

class Service
{
    public function storeSession($validatedData){
        $films = Films::find($validatedData['film_id']);
        $films->status = 1;
        $films->date = $validatedData['date_time'];
        $films->payment = $validatedData['payment'];
        $films->save();
    }

    public function storeFilm($validatedData)
    {
        $film = new Films();
        $film->title = $validatedData['title'];
        $film->description = $validatedData['description'];
        $film->duration = $validatedData['duration'];
        $film->age_limit = $validatedData['age_limit'];
        $film->save();

        return $film;
    }

    public function updateFilmPhoto(Films $film, $extension)
    {
        $film->type_photo = $extension;
        $film->save();
    }

    public function updateFilm($validatedData){
        $films = Films::find($validatedData['film_id']);
        $films->title = $validatedData['title'];
        $films->description = $validatedData['description'];
        $films->duration = $validatedData['duration'];
        $films->age_limit = $validatedData['age_limit'];
        $films->status = $validatedData['status'];
        $films->date = $validatedData['date_time'];
        $films->payment = $validatedData['payment'];
        $films->save();
    }
}
