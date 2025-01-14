<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CxSearchRule implements Rule
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
        // Rule 1: Must be numeric unless it matches Rule 3
        if (!preg_match('/^[0-9VvXx]+$/', $value)) {
            return false;
        }

        // Rule 2: Start with 0 and must be exactly 10 characters
        if (str_starts_with($value, '0') && strlen($value) === 10) {
            return true;
        }

        // Rule 3: 9 numeric characters followed by 'V', 'v', 'X', or 'x'
        if (preg_match('/^\d{9}[VvXx]$/', $value)) {
            return true;
        }

        // Rule 4: Otherwise, must be exactly 12 numeric characters
        if (preg_match('/^\d{12}$/', $value)) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Wrong input';
    }
}
