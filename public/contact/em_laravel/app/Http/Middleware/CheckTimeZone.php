<?php

namespace App\Http\Middleware;

use App\Library\Common;
use Closure;
use Illuminate\Support\Facades\App;

class CheckTimeZone {
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     *
     * @return mixed
     */
    public function handle( $request, Closure $next ) {
        date_default_timezone_set( Auth::user()->timezone );
        App::setTimeZone( Auth::user()->timezone );

        return $next( $request );
    }
}
