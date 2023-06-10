<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CharacterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'species' => 'required',
            'status' => 'required',
            'type' => 'nullable',
            'gender' => 'nullable',
            'origin' => 'nullable',
            'location' => 'nullable',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Se necesita un nombre',
            'species.required' => 'Se necesita dar una especie',
            'status.required' => 'Se necesita dar su estado actual',
        ];
    }
}
