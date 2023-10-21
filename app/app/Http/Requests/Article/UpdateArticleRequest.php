<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateArticleRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title'       => [
                'required',
                'max:50',
                Rule::unique('articles')->ignore($this->article),
            ],
            'description' => [
                'required',
            ],
            'category_id' => [
                'required',
                'exists:categories,id',
            ],
            'tags'        => [
                'array',
                'exists:tags,id',
            ],
            'images'      => [
                'array',
                'each' => [
                    'image',
                    'mimes:jpg,png,jpeg',
                    'max:1024',
                ],
            ],
        ];

    }
}
