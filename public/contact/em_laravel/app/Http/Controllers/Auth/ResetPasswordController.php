<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller {
  /*
  |--------------------------------------------------------------------------
  | Password Reset Controller
  |--------------------------------------------------------------------------
  |
  | This controller is responsible for handling password reset requests
  | and uses a simple trait to include this behavior. You're free to
  | explore this trait and override any methods you wish to tweak.
  |
  */

  use ResetsPasswords;

  /**
   * Where to redirect users after resetting their password.
   *
   * @var string
   */
  protected $redirectTo = RouteServiceProvider::HOME;

  protected function rules() {
    return [
      '_token'   => 'required',
      'email'    => 'required|email',
      'password' => 'required|confirmed|min:8',
    ];
  }

  protected function validationErrorMessages() {
    return [
      '_token.required'            => "Token Required",
      'email.required'             => "E-Mail Address Required",
      'email.email'                => "Check the E-Mail Address",
      'password.required'          => "Password Required",
      'password-confirm.required'  => "Confirm Password Required",
      'password-confirm.confirmed' => "Confirm Password does not match",
    ];
  }

  public function reset( Request $request ) {
    $request->validate( $this->rules(), $this->validationErrorMessages() );

    // Here we will attempt to reset the user's password. If it is successful we
    // will update the password on an actual user model and persist it to the
    // database. Otherwise we will parse the error and return the response.
    $response = $this->broker()
      ->reset( $this->credentials( $request ), function ( $user, $password ) {
        $this->resetPassword( $user, $password );
      } );

    // Auth::logout();

    // If the password was successfully reset, we will redirect the user back to
    // the application's home authenticated view. If there is an error we can
    // redirect them back to where they came from with their error message.
    return $response == Password::PASSWORD_RESET ? $this->sendResetResponse( $request, $response ) : $this->sendResetFailedResponse( $request, $response );
  }
}
