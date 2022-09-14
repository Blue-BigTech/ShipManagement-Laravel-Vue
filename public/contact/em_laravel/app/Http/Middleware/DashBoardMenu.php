<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use View;
use App\DashBoard;

class DashBoardMenu {
  /**
   * Handle an incoming request.
   *
   * @param \Illuminate\Http\Request $request
   * @param \Closure $next
   *
   * @return mixed
   */
  public function handle( $request, Closure $next ) {
    DashBoard::init();
    View::share( 'dash_board_menus', DashBoard::$menus );
    return $next( $request );
  }

  public static function set_memu() {
    View::share( 'dash_board_menus', DashBoard::$menus );
  }

}
