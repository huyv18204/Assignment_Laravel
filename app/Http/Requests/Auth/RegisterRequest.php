<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => ['required', 'unique:users', 'max:255'],
            'password' => 'required|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => ":attribute bị bỏ trống",
            'email.required' => ":attribute bị bỏ trống"
        ];
    }


    public function attributes()
    {
        return [
            'name' => "Tên",
            'email'=>"Hòm thư điện tử"
        ];
    }
}
