<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnonceRequest extends FormRequest
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
            
            'titre'=>'required|min:5|max:255',
            'contenu'=>'required|string',
            'entreprise_id'=>'required',
        ];
    }

    public function messages(): array
    {
        return [
            'titre.required' => 'vous devez remplir le champ du titre',
            'titre.min' => 'Le titre doit avoir au moins :min caractères.',
            'titre.max' => 'Le titre ne doit pas dépasser :max caractères.',
            'contenu.required' => 'Le champ contenu est requis.',
            'contenu.string' => 'Le champ contenu doit être une chaîne de caractères.',
            'entreprise_id.required' => 'Le champ entreprise_id est requis.',
        ];
    }
}
