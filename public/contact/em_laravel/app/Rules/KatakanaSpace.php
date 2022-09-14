<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class KatakanaSpace implements Rule {
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    /**
     * カタカナのみ（タブ、スペースは許可する）
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
        $regex = "/^([　 \t\r\n]|[ァ-ヶｦ-ﾟー])+$/u";

        return preg_match( $regex, $value ) === 1 ? true : false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message() {
        return __( "validation.katakana_space" );
    }
}
