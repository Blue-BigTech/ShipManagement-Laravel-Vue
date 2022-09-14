<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AlphabetNumHyphenUnderscore implements Rule {
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    /**
     * 英数字・ハイフン・アンダースコアのみ許容
     *
     * @param string $attribute
     * @param mixed $value
     *
     * @return bool
     */
    public function passes( $attribute, $value ) {
        if(!$value){
            return true;
        }
        $regex = "/^[a-zA-Z0-9_-]+$/";

        return preg_match( $regex, $value ) === 1 ? true : false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message() {
        return __( "validation.alphabet_num_hyphen_underscore" );
    }
}
