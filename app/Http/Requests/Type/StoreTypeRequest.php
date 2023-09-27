<?php

namespace App\Http\Requests\Type;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreTypeRequest extends FormRequest
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
            'content' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Inserire il titolo è obbligatorio!',
            'title.max' => 'Inserire il titolo con massimo 64 caratteri!',
        ];
    }
}
