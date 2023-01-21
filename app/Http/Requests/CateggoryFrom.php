<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CateggoryFrom extends FormRequest
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
            'category_name'=>'required|regex:/^[\pL\s\-]+$/u|max:255|unique:categories,category_name',
            'category_title'=>'required',
            'category_description'=>'required',
            'category_photo'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'category_name.required'=>'faka diso ken?',
            'category_name.regex'=>'Please integer your latter?',
            'category_name.max'=>'Please insert only 5 latter?',
            'category_name.unique'=>'The category name has already been taken???',
            'category_title.required'=>'faka diso ken?',
            'category_description.required'=>'faka diso ken?'

        ];
    }
}
