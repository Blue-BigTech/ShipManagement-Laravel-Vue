<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Hiragana implements Rule {
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    /**
     * ひらがなのみ
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
        $regex = "/^[ぁ-んー]+$/u";

        return preg_match( $regex, $value ) === 1 ? true : false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message() {
        return __( "validation.hiragana" );
    }
}
