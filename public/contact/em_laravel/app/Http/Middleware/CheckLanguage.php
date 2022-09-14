<?php

namespace App\Http\Middleware;

use App\Library\Common;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;

class CheckLanguage {
  /**
   * Handle an incoming request.
   *
   * @param \Illuminate\Http\Request $request
   * @param \Closure $next
   *
   * @return mixed
   */
  public function handle( $request, Closure $next ) {
    App::setLocale( Auth::user()->language );
    View::share( 'languages', Common::lang_list() );

    return $next( $request );
  }
}
