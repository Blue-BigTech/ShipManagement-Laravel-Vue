<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePluginsTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create( 'plugins', function ( Blueprint $table ) {
      $table->bigIncrements( 'id' );
      $table->timestamps();
      $table->string( 'uid' )
        ->nullable();
      $table->string( 'version_uid' )
        ->nullable();
      $table->date( "release_date" );
      $table->date( "final_update_date" );
      $table->text( 'category' )
        ->nullable();
      $table->text( 'name' )
        ->nullable();
      $table->text( 'version' )
        ->nullable();
      $table->text( 'folder_name' )
        ->nullable();
      $table->text( 'latest_version_supported' )
        ->nullable();
      $table->text( 'developer_id' )
        ->nullable();
      $table->text( 'developer_name' )
        ->nullable();
      $table->text( 'developer_url' )
        ->nullable();
      $table->text( 'url' )
        ->nullable();
      $table->integer( 'price' )
        ->nullable();
      $table->text( 'overview' )
        ->nullable();
      $table->text( 'description' )
        ->nullable();
      $table->text( 'how_to_install' )
        ->nullable();
      $table->text( 'required_version' )
        ->nullable();
      $table->boolean( 'active_flag' )
        ->default( false );
    } );
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists( 'plugins' );
  }
}
