<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ArticleState implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $status = array_keys(articleState());

        if(! in_array($value, $status)){
            $fail(__('validation.exists', ['attribute' => $attribute]));
        };

        return;
    }
}
