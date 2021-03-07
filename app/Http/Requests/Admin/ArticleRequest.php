<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'body' => 'required'

        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Judul Wajib Di Isi.',
            'body.required' => 'Tentang Artikel Wajib Di Isi.',
        ];
    }
}
