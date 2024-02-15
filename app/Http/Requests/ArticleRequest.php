<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'slug' => [
                'nullable',
                'string',
                'regex:/^[a-zA-Z0-9_-]+$/u',
                'unique:articles.slug',
                'max:255',
            ],
            'title' => 'required', 'string', 'min:5', 'max:100',
            'description' => 'required', 'string', 'max:255',
            'body' => 'required', 'string',
            'published_at' => 'sometimes', 'data', 'date_format:Y-m-d H:i:s'
        ];
    }
}
