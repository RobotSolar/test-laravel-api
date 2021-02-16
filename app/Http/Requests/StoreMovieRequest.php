<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreMovieRequest extends FormRequest
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

        //dd('hello');
        return [
            'title'         =>  'required|max:255',
            'description'   =>  'required|max:1000',
            'year'          =>  'required',
            'cover'         =>  'required',
            'popularity'    =>  'numeric|required|min:0|max:5',
            'director'      =>  'required|max:255',
        ];
    }


    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'payload'   => 'Please check your request data',
            'errors'    => $validator->errors()
        ], 422));
    }

}
