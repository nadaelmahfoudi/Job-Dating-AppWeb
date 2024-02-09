<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkillRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true ;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|min:3|max:20',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'vous devez remplir le champ du name',
            'name.min' => 'Le name doit avoir au moins :min caractères.',
            'name.max' => 'Le name ne doit pas dépasser :max caractères.',
        ];
    }
}
