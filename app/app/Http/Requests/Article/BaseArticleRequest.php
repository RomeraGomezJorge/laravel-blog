<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class BaseArticleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    protected function commonRules(): array
    {
        return [
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
            'images'      => ['array'],
            'images.*'    => [
                'mimes:jpg,png,jpeg',
                'max:1024',
            ],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'images.*.mimes' => __('The image :position must be a file of type: :values.'),
            'images.*.max'   => __('The image :position may not be greater than :max.'),
        ];
    }
}
