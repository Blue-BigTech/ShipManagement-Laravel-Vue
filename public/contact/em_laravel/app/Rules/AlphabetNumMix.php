<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AlphabetNumMix implements Rule
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
        $al_regex  = "/^[a-zA-Z]+$/";
        $num_regex = "/^[0-9]+$/";

        $ret = true;
        if(!preg_match( $al_regex, $value ) === 1){
            $ret = false;
        }
        if(!preg_match( $num_regex, $value ) === 1){
            $ret = false;
        }
        return  $ret;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __( "validation.alphabet_num_mix" );
    }
}
