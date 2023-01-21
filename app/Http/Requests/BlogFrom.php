<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogFrom extends FormRequest
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
            'blog_name'=>'required',
            'blog_email'=>'required|unique:blogs,blog_email',
        ];
    }
    public function messages()
    {
        return [
            'blog_name.required'=>'faka diso ken?',
            'blog_email.required'=>'faka diso ken?',
        ];
    }
}
