<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AdminPassword implements Rule {
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    /**
     * 8文字以上の半角英数混在アンダースコア
     *
     * @param string $attribute
     * @param mixed $value
     *
     * @return bool
     */
    public function passes( $attribute, $value ) {
        $ret = true;
        //英数アンダーバー以外の文字がある
        if ( !preg_match( "/^[a-zA-Z0-9_]+$/", $value ) ) {
            $ret = false;
        }

        //半角英語の文字がない
        if ( !preg_match( "/[a-zA-Z]/", $value ) ) {
            $ret = false;
        }

        //数字がない
        if ( !preg_match("/[0-9]/", $value) ) {
            $ret = false;
        }

        //文字数のチェック
        if ( strlen( $value ) < 8 || strlen( $value ) > 32) {
            $ret = false;
        }

        return $ret;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message() {
        return __( "validation.admin_password" );
    }
}
