<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUser extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'usertype' => 'required|string|in:Admin,ojt_in_charge',
            'gender' => 'required|string|in:Male,Female',
            'campus_id' => 'required|exists:campuses,id',
            'courses_id' => 'required|exists:programs,id',
            'contact' => 'required|string|max:15',
            'email' => ['sometimes', 'string', 'email', 'max:255', 'unique:users,email,'.$this->route('users')->id],
            'password' => 'nullable|string',
        ];
    }
}
