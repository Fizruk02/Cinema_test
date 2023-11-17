<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilmStoreRequest;
use App\Http\Requests\FilmUpdateRequest;
use App\Models\Films;

class FilmController extends Controller
{
    public function create(){
        return view('film.create');
    }

    public function store(FilmStoreRequest $request)
    {
        $validatedData = $request->validated();

        $films = new Films();
        $films->title = $validatedData['title'];
        $films->description = $validatedData['description'];
        $films->duration = $validatedData['duration'];
        $films->age_limit = $validatedData['age_limit'];
        $films->save();

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = $films->id . '.' . $extension;
            $folder = 'upload/film';

            $file->storeAs($folder, $filename, 'public');

            $films->type_photo = $extension;
            $films->save();
        }

        return redirect()->route('films')->with('message', 'Фильм успешно добавлен!');
    }

    public function edit(Films $film){
        return view('film.edit', compact('film'));
    }

    public function update(FilmUpdateRequest $request)
    {
        $validatedData = $request->validated();

        $films = Films::find($validatedData['film_id']);
        $films->title = $validatedData['title'];
        $films->description = $validatedData['description'];
        $films->duration = $validatedData['duration'];
        $films->age_limit = $validatedData['age_limit'];
        $films->status = $validatedData['status'];
        $films->date = $validatedData['date_time'];
        $films->payment = $validatedData['payment'];
        $films->save();

        return redirect()->route('films')->with('message', 'Сеанс успешно изменён!');
    }

    public function delete(Films $film){
        $film->delete();
        return redirect()->route('films')->with('message', 'Фильм успешно создан!');
    }
}
