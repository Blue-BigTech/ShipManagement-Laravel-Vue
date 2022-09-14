<?php

namespace App\Http;

use App\Http\Middleware\CheckLanguage;
use App\Http\Middleware\DashBoardMenu;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel {
  /**
   * The application's global HTTP middleware stack.
   *
   * These middleware are run during every request to your application.
   *
   * @var array
   */
  protected $middleware = [
    \App\Http\Middleware\TrustProxies::class,
    \App\Http\Middleware\CheckForMaintenanceMode::class,
    \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
    \App\Http\Middleware\TrimStrings::class,
    \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
  ];

  /**
   * The application's route middleware groups.
   *
   * @var array
   */
  protected $middlewareGroups = [
    'web' => [
      \App\Http\Middleware\EncryptCookies::class,
      \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
      \Illuminate\Session\Middleware\StartSession::class,
      // \Illuminate\Session\Middleware\AuthenticateSession::class,
      \Illuminate\View\Middleware\ShareErrorsFromSession::class,
      \App\Http\Middleware\VerifyCsrfToken::class,
      \Illuminate\Routing\Middleware\SubstituteBindings::class,
    ],

    'api' => [
      'throttle:60,1',
      \Illuminate\Routing\Middleware\SubstituteBindings::class,
    ],
  ];

  /**
   * The application's route middleware.
   *
   * These middleware may be assigned to groups or used individually.
   *
   * @var array
   */
  protected $routeMiddleware = [
    'auth'                => \App\Http\Middleware\Authenticate::class,
    'auth.basic'          => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
    'bindings'            => \Illuminate\Routing\Middleware\SubstituteBindings::class,
    'cache.headers'       => \Illuminate\Http\Middleware\SetCacheHeaders::class,
    'can'                 => \Illuminate\Auth\Middleware\Authorize::class,
    'guest'               => \App\Http\Middleware\RedirectIfAuthenticated::class,
    'password.confirm'    => \Illuminate\Auth\Middleware\RequirePassword::class,
    'signed'              => \Illuminate\Routing\Middleware\ValidateSignature::class,
    'throttle'            => \Illuminate\Routing\Middleware\ThrottleRequests::class,
    'verified'            => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
    'check_language'      => \App\Http\Middleware\CheckLanguage::class,
    'check_auth'          => \App\Http\Middleware\CheckAuth::class,
    'dash_board_menu'     => \App\Http\Middleware\DashBoardMenu::class,
    'admin_auth'          => \App\Http\Middleware\AdminAuth::class,
    'sub_admin_auth'      => \App\Http\Middleware\SubAdminAuth::class,
    'general_editor_auth' => \App\Http\Middleware\GeneralEditorAuth::class,
    'editor_auth'         => \App\Http\Middleware\EditorAuth::class,
    'reader_auth'         => \App\Http\Middleware\ReaderAuth::class,
  ];

  /**
   * The priority-sorted list of middleware.
   *
   * This forces non-global middleware to always be in the given order.
   *
   * @var array
   */
  protected $middlewarePriority = [
    \Illuminate\Session\Middleware\StartSession::class,
    \Illuminate\View\Middleware\ShareErrorsFromSession::class,
    \App\Http\Middleware\Authenticate::class,
    \Illuminate\Routing\Middleware\ThrottleRequests::class,
    \Illuminate\Session\Middleware\AuthenticateSession::class,
    \Illuminate\Routing\Middleware\SubstituteBindings::class,
    \Illuminate\Auth\Middleware\Authorize::class,
    \App\Http\Middleware\CheckLanguage::class,
    \App\Http\Middleware\DashBoardMenu::class,
  ];
}
