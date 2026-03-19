<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class propertyRequest extends FormRequest
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
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'prix' => 'required|integer|min:0',
            'ville' => 'required|string|max:100',
            'adresse' => 'required|string|max:255',
            'code_postal' => 'required|integer|min:5',
            'surface' => 'required|integer|min:0',
            'vendu' => 'boolean', // Assuming 'vendu' is a boolean field
        ];
    }
}
