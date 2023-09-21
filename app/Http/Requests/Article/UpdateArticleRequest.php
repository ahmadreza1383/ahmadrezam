<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|unique:articles,title'
        ];
    }

    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validated)
    {
        throw new HttpResponseException(response()->json([
            'message' => $validated->errors(),
            'success' => false
        ]));
    }
}
