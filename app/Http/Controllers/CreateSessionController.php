<?php

namespace App\Http\Controllers;

use App\Models\Films;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CreateSessionController extends Controller
{
    public function create(){
        $films = Films::all()->where('status', '=', 0);
        return view('set_session', compact('films'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'film_id' => 'required|numeric',
            'date_time' => 'required|date',
            'payment' =>   'required|regex:/^\d{1,3}(\.\d{1,2})?$/'//['required', 'numeric', 'regex:/^\d*(\.\d{1,2})?$/'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $films = Films::find($request->input('film_id'));
        $films->status = 1;
        $films->date = $request->input('date_time');
        $films->payment = $request->input('payment');
        $films->save();

        return redirect()->back()->with('success', 'Сеанс успешно создан.');
    }
}
