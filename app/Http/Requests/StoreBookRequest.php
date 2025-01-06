<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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

            'translations.en.title' => 'sometimes|string',
            'translations.uz.title' => 'sometimes|string',
            'translations.ru.title' => 'sometimes|string',

            'translations.en.content' => ['required_with:translations.en.title', 'string'],
            'translations.uz.content' => ['required_with:translations.uz.title', 'string'],
            'translations.ru.content' => ['required_with:translations.ru.title', 'string'],

            'images' => 'required|max:2048|mimes:jpg,png',
        ];
    }
}
