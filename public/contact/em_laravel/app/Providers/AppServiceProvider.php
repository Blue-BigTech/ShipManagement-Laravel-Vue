<?php

namespace App\Providers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Encryption\Encrypter;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use App\PluginManager\EmPluginManager;
use App\DashBoard;
use Illuminate\View\View;
use App\User;

class AppServiceProvider extends ServiceProvider {
  /**
   * Register any application services.
   *
   * @return void
   */
  public function register() {
    //
  }

  /**
   * Bootstrap any application services.
   *
   * @return Application|Factory|View
   */
  public function boot() {
    EmPluginManager::init();
    if ( !config( "app.key" ) ) {
      $key  = 'base64:' . base64_encode( Encrypter::generateKey( config( 'app.cipher' ) ) );
      $path = base_path() . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR . "app.php";
      file_put_contents( $path, str_replace( "'APP_KEY', ''", "'APP_KEY', '" . $key . "'", file_get_contents( $path ) ) );
      Artisan::call( 'config:clear' );
      Config::set( 'app.key', $key );
      usleep( 3000000 );

      return view( "setup.starting_setup" );
    }

    Blade::if( 'is_admin', function () {
      return ( auth()->check() && auth()->user()->is_admin );
    } );
    Blade::if( 'is_sub_admin', function () {
      return ( auth()->check() && auth()->user()->is_sub_admin );
    } );
    Blade::if( 'is_general_editor', function () {
      return ( auth()->check() && auth()->user()->is_general_editor );
    } );
    Blade::if( 'is_editor', function () {
      return ( auth()->check() && auth()->user()->is_editor );
    } );
    Blade::if( 'is_reader', function () {
      return ( auth()->check() && auth()->user()->is_reader );
    } );

  }
}
