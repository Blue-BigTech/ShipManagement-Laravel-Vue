<?php

namespace App\Http\Middleware;

use App\Owners;
use Closure;

class ReaderAuth {
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     *
     * @return mixed
     */
    public function handle( $request, Closure $next ) {
        if ( auth()->check() && auth()->user()->is_reader ) {

            return $next( $request );

        }

        return redirect()->route( 'login' );
    }
}
