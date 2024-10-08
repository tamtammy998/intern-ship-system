<?php

namespace App\Http\Requests\Programs;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProgram extends FormRequest
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
            'abbreviation' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'campus_id' => 'required|string|max:255',
            'oic' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ];
    }
}
