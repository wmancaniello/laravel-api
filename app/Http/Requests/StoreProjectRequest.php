<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255', 'unique:projects'],
            'category_id' => ['nullable'],
            'description' => ['required', 'string'],
            'technologies' => ['nullable', 'exists:technologies,id']
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Il titolo è obbligatorio.',
            'description.required' => 'La descrizione è obbligatoria.',
        ];
    }
}
