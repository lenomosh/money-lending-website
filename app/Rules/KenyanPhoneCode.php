<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class KenyanPhoneCode implements Rule
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
        if (!empty($value)){
            $newtel = substr($value, 0, 5);
            if ($newtel == '+2547'){
                return true;
            };

        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Phone Number Must start with +2547';
    }
}
