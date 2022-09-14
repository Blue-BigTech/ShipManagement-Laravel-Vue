<?php

namespace App\Http\Middleware;

use App\Owners;
use Closure;

class SubAdminAuth {
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     *
     * @return mixed
     */
    public function handle( $request, Closure $next ) {
        if ( auth()->check() && auth()->user()->is_sub_admin ) {

            return $next( $request );

        }

        return redirect()->route( 'login' );
    }
}
