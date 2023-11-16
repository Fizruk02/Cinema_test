<?php

namespace App\Http\Controllers;

use App\Models\Films;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FilmController extends Controller
{
    public function create(){
        return view('create_film');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required',
            'duration' => 'required|numeric',
            'age_limit' => 'required|numeric',
            'photo' => 'required|image',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $films = new Films();
        $films->title = $request->input('title');
        $films->description = $request->input('description');
        $films->duration = $request->input('duration');
        $films->age_limit = $request->input('age_limit');
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

        return redirect()->back()->with('success', 'Фильм успешно создан.');
    }

    public function edit(Request $request){
        dd($request);
        $validator = Validator::make($request->all(), [
            'id' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $film = Films::find($request->input('id'));
        return view('edit_film', compact('film'));
    }

    public function update(Request $request){

    }
}
