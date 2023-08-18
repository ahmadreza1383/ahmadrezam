<?php

namespace App\Http\Requests\Article\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;

class UpdateArticleCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth::check()){
            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:100|unique:article_categories,name',
            'parent_id' => 'sometimes|integer|exists:article_categories,id'
        ];
    }

    public function prepareForValidation()
    {
        if(!is_numeric($this->parent_id)){
            $this->replace($this->except('parent_id'));
        }
    }

    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validated)
    {
        throw new HttpResponseException(response()->json([
            'message' => $validated->errors(),
            'success' => false
        ]));
    }
}
