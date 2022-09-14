<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Library\Common;
use Symfony\Component\Mime\MimeTypes;

class UploadFileRule implements Rule {

  private $file_type;
  private $value;

  /**
   * Create a new rule instance.
   *
   * @return void
   */
  public function __construct( $file_type ) {
    $this->file_type = $file_type;
  }

  /**
   * Determine if the validation rule passes.
   *
   * @param string $attribute
   * @param mixed $value
   *
   * @return bool
   */
  public function passes( $attribute, $value ) {
    $ret          = false;
    $video_accept = implode( ",", Common::$file_type_video_accept );
    $image_accept = implode( ",", Common::$file_type_image_accept );
    $audio_accept = implode( ",", Common::$file_type_audio_accept );

    $extensions = MimeTypes::getDefault()->getExtensions($value->getClientMimeType());

    if ( is_null( $this->file_type ) === true ) { // 拡張子制限が未入力
      $ret = true;
    }
    else if ( strpos( $this->file_type, "video/*" ) !== false && strpos( $video_accept, $value->guessClientExtension() ) !== false ) {
      $ret = true;
    }
    else if ( strpos( $this->file_type, "image/*" ) !== false && strpos( $image_accept, $value->guessClientExtension() ) !== false ) {
      $ret = true;
    }
    else if ( strpos( $this->file_type, "audio/*" ) !== false && strpos( $audio_accept, $value->guessClientExtension() ) !== false ) {
      $ret = true;
    }
    else if ( $this->checkExtensions($this->file_type, $extensions) !== false ) {
      $ret = true;
    }
    return $ret;
  }

  /**
   * Get the validation error message.
   *
   * @return string
   */
  public function message() {
    return __( "validation.js_file_extension_error_msg" );
  }

  /**
   * Check upload file extension
   *
   * @return boolean
   */
  public function checkExtensions($file_type, $extensions)
  {
    $ret = false;

    foreach ($extensions as $value) {
      if (strpos( $file_type, $value )) {
        $ret = true;
        break;
      }
    }
    return $ret;
  }
}
