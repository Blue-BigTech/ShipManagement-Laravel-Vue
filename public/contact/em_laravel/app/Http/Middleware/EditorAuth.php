<?php

namespace App\Http\Middleware;

use App\Owners;
use Closure;

class EditorAuth {
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     *
     * @return mixed
     */
    public function handle( $request, Closure $next ) {
        if ( auth()->check() && auth()->user()->is_editor ) {

            return $next( $request );

        }

        return redirect()->route( 'login' );
    }
}
