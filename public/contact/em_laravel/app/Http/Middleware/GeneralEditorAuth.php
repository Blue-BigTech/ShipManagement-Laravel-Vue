<?php

namespace App\Http\Middleware;

use App\Owners;
use Closure;

class GeneralEditorAuth {
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     *
     * @return mixed
     */
    public function handle( $request, Closure $next ) {
        if ( auth()->check() && auth()->user()->is_general_editor ) {

            return $next( $request );

        }

        return redirect()->route( 'login' );
    }
}
