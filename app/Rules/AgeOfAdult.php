<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use DateTime;

class AgeOfAdult implements Rule
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
            $today = new DateTime(date("m/d/Y"));
            $bday = new DateTime($value);
            $interval = $today->diff($bday);
            if (intval($interval->y) >= 18) {
                return true;
        }

        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "This service is allowed to people over 18 years. Please check date and try again. Make sure you put date in the following format mm/dd/yyyy";
    }
}
