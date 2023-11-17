<?php

namespace App\Http\Controllers;

use App\Http\Requests\SessionStoreRequest;
use App\Models\Films;

class SessionController extends Controller
{
    public function create(){
        $films = Films::all()->where('status', '=', 0);
        return view('film.session.create', compact('films'));
    }

    public function store(SessionStoreRequest $request)
    {
        $validatedData = $request->validated();

        $films = Films::find($validatedData['film_id']);
        $films->status = 1;
        $films->date = $validatedData['date_time'];
        $films->payment = $validatedData['payment'];
        $films->save();

        return redirect()->route('films')->with('message', 'Сеанс успешно создан!');
    }
}
