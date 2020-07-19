<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class SafaricomLine implements Rule
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
        $saf = substr($value,5,1);
            $list = array("7","8","3","6");
            if (!in_array($saf,$list)){
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
        return 'We currently support only Safaricom phone numbers';
    }
}
