<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NumDecimal implements Rule {
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    /**
     * 小数点を含む数字（正の数のみ）
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
        $regex = "/^\d+(?:\.\d+)?$/";

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
