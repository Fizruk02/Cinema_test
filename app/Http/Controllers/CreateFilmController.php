<?php

namespace App\Http\Controllers;

use App\Models\Films;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CreateFilmController extends Controller
{
    public function create(){
        return view('create');
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

            // Обновляем путь к фото в модели
            $films->type_photo = $extension;
            $films->save();
        }

        return redirect()->back()->with('success', 'Фильм успешно создан.');
    }
}
