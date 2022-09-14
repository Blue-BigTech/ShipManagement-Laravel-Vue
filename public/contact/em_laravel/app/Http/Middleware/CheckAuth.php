<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

/**
 * 閲覧権限チェッククラス
 */
class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param object  $request
     * @param object  $next
     * @param integer $path 
     * @return mixed
     */
    public function handle($request, Closure $next, int $auth)
    {
        if (auth()->check() && self::checkUser() && self::checkPage($auth)) {
            return $next($request);
        }

        return redirect()->route('logout');
    }

    /**
     * 各権限ごとのログイン認証
     *
     * @return boolean
     */
    public static function checkUser()
    {
        $function = 'is_' . User::$auth_role[auth()->user()->role];
        return auth()->user()->$function;
    }

    /**
     * 閲覧権限チェック
     *
     * @return boolean
     */
    public static function checkPage($auth)
    {
        return (auth()->user()->role & $auth) > 0;
    }
}
