<?php

namespace App\Http\Requests\Article;

use Illuminate\Validation\Rule;

class StoreArticleRequest extends BaseArticleRequest
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
        return
            array_merge(
                $this->commonRules(),
                ['title' => [
                    'required',
                    'max:50',
                    Rule::unique('articles')]
                ]
            );
    }

}
