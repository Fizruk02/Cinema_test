<?php

namespace App\Http\Controllers;

use App\Http\Requests\SessionStoreRequest;
use App\Models\Films;
use Illuminate\Http\RedirectResponse;

class SessionController extends BaseController
{
    public function create()
    {
        $films = Films::all()->where('status', '=', 0);
        return view('film.session.create', compact('films'));
    }

    public function store(SessionStoreRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();
        $this->service->storeSession($validatedData);
        return redirect()->route('films')->with('message', 'Сеанс успешно создан!');
    }
}
