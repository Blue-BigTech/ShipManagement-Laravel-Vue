<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChoicesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create( 'choices', function ( Blueprint $table ) {
            $table->bigIncrements( 'id' );
            $table->timestamps();
            $table->integer( 'view_no' );
            $table->bigInteger( 'block_id' )->nullable();
            $table->string( 'choice_type' )->nullable();
            $table->text( 'label_text' )->nullable();
            $table->string( 'image' )->nullable();
            $table->integer( 'delete_flag' );
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists( 'choices' );
    }
}
