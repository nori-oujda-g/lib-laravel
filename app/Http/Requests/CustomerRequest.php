<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'name' => 'required|min:3|max:100|unique:customers',
            'avatar' => 'image|mimes:png,jpg,svg,jpeg|max:10240',
            // le max de l'image est par defaut en KB .
            'email' => 'required|email|unique:customers',
            'image' => 'required|url',
            'password' => 'required|confirmed|min:3|max:100',
            'bio' => 'nullable|string',
        ];
    }
}
