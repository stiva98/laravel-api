<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
//Helpers
use Illuminate\Support\Facades\Auth;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:64',
            'slug' => 'required|max:64',
            'content' => 'nullable',
            'cover_image' => 'nullable|image|max:4096',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Inserire il titolo è obbligatorio!',
            'title.max' => 'Inserire il titolo con massimo 64 caratteri!',
            'slug.required' => 'Inserire lo slug è obbligatorio!',
            'slug.max' => 'Inserire lo slug con massimo 64 caratteri!',
            'cover_image.image' => 'Inserire un file di tipo immagine!',
            'cover_image.max' => 'Inserire un file di tipo immagine di max 4 KB!'
        ];
    }
}
