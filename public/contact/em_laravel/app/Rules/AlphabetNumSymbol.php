<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AlphabetNumSymbol implements Rule {
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    /**
     * AlphabetNumSymbol
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
        $regex = "/^[[:graph:]|[:space:]]+$/i";

        return preg_match( $regex, $value ) === 1 ? true : false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message() {
        return __( "validation.num_decimal" );
    }
}
