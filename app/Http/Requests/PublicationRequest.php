<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicationRequest extends FormRequest
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
            'title' => 'required|min:3|max:100',
            'image' => 'image|mimes:png,jpg,svg,jpeg|max:10240',
            'body' => 'required|min:10',
        ];
    }
    public function messages(): array
    {
        return [
            'title' => 'العنوان ضروري آ راس العجل 😒',
        ];
    }
}
