<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
// use App\Http\Requests\Request;

class BookRequest extends FormRequest
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
            $rules = [
                'name' => 'min:1|max:120|required',
                'author' => 'min:1|max:120|required',
                'quantity' => 'required|numeric|min:1|max:10',
                'genre' => 'required',
            ];

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre de del libro es obligatorio',
            'name.min' => 'El nombre del libro debe contener al menos :min carácteres',
            'name.max' => 'El nombre del libro debe contener un máximo de :max carácteres',

            'author.required' => 'El nombre del autor es obligatorio',
            'author.min' => 'El nombre del autor debe contener al menos :min carácteress',
            'author.max' => 'El nombre del autor debe contener un máximo de :max carácteres',

            'quantity.required' => 'La cantidad es obligatorio',
            'quantity.numeric' => 'La cantidad debe ser un numero',
            'quantity.min' => 'La cantidad debe ser un numero mayor a 0',
            'quantity.max' => 'La cantidad debe no puede ser mayor a :max',

            'genre.required' => 'El genero del libro es obligatorio',

        ];
    }
}
