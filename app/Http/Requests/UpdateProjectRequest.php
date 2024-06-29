<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
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
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:255', Rule::unique('projects')->ignore($this->project)],
            'category_id' => ['nullable'],
            'description' => ['required', 'string'],
            'tags' => ['nullable', 'exists:tags,id']
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
