<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;

class FilmUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'film_id' => 'required|numeric',
            'date_time' => 'required|date',
            'payment' =>   'required|regex:/^\d{1,3}(\.\d{1,2})?$/',
            'title' => 'required|max:255',
            'status' => 'required|numeric',
            'description' => 'required',
            'duration' => 'required|numeric',
            'age_limit' => 'required|numeric'
        ];
    }
}
