<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
           'translations.en.title' => 'nullable|sometimes|string',
            'translations.uz.title' => 'nullable|sometimes|string',
            'translations.ru.title' => 'nullable|sometimes|string',

            'translations.en.content' => ['nullable:translations.en.title', 'string'],
            'translations.uz.content' => ['nullable:translations.uz.title', 'string'],
            'translations.ru.content' => ['nullable:translations.ru.title', 'string'],

            'images' => 'nullable|array',
            'images.*' => 'file|mimes:jpg,jpeg,png|max:2048',
        ];
    }
}
