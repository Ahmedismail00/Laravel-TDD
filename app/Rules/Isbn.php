<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Isbn implements Rule
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
        return (bool)preg_match("/^\d{2}[A-Z]-\d{3}-\d{2}[A-F]{2}$/",$value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'ISBN must be of valid format';
    }
}
