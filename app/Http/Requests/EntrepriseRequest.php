<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntrepriseRequest extends FormRequest
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
            'name'=>'required|min:10|max:255',
            'location'=>'required|string',
            'details'=>'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'vous devez remplir le champ du name',
            'name.min' => 'Le name doit avoir au moins :min caractères.',
            'name.max' => 'Le name ne doit pas dépasser :max caractères.',
            'location.required' => 'Le champ location est requis.',
            'location.string' => 'Le champ location doit être une chaîne de caractères.',
            'details.required' => 'Le champ details est requis.',
            'details.string' => 'Le champ details doit être une chaîne de caractères.',
        ];
    }
}
