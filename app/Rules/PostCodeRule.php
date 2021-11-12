<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PostCodeRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $postcode = mb_convert_kana($value, "an");
        if (preg_match("/^[0-9]{3}-[0-9]{4}$/", $postcode)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '郵便番号が正しく入力されていません ( 例 123-4567 )';
    }
}
