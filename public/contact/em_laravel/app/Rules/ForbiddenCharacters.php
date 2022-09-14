<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ForbiddenCharacters implements Rule {

  public $forbidden_characters;
  public $value;
  public $error_chara;

  /**
   * Create a new rule instance.
   *
   * @return void
   */
  public function __construct( $characters, $value ) {
    $this->forbidden_characters = $characters;
    $this->value                = $value;
    $this->error_chara          = "";
  }

  /**
   * 入力禁止文字列
   *
   * @param string $attribute
   * @param mixed $value
   *
   * @return bool
   */
  public function passes( $attribute, $value ) {
    if ( !$value ) {
      return true;
    }

    $ar  = explode( ",", $this->forbidden_characters );
    $ret = true;
    foreach ( $ar as $chara ) {
      if ( strstr( $value, $chara ) !== false ) {
        $ret = false;
        $this->error_chara .= $chara." ";
      }
    }

    return $ret;
  }

  /**
   * Get the validation error message.
   *
   * @return string
   */
  public function message() {
    return __( "validation.forbidden_charecters", [ "attribute" => $this->error_chara ] );
  }
}
