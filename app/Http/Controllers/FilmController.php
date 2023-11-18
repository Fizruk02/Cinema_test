<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilmStoreRequest;
use App\Http\Requests\FilmUpdateRequest;
use App\Models\Films;
use Illuminate\Http\RedirectResponse;

class FilmController extends BaseController
{
    public function create()
    {
        return view('film.create');
    }

    public function store(FilmStoreRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();
        $film = $this->service->storeFilm($validatedData);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = $film->id . '.' . $extension;
            $folder = 'upload/film';

            $file->storeAs($folder, $filename, 'public');

            $this->service->updateFilmPhoto($film, $extension);
        }

        return redirect()->route('films')->with('message', 'Фильм успешно добавлен!');
    }

    public function edit(Films $film)
    {
        return view('film.edit', compact('film'));
    }

    public function update(FilmUpdateRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();
        $this->service->updateFilm($validatedData);
        return redirect()->route('films')->with('message', 'Сеанс успешно изменён!');
    }

    public function delete(Films $film): RedirectResponse
    {
        $film->delete();
        return redirect()->route('films')->with('message', 'Фильм успешно создан!');
    }
}
