<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'form_blocks', function ( Blueprint $table ) {
            $table->bigIncrements( 'id' );
            $table->timestamps();
            $table->integer( 'view_no' )->nullable();
            $table->string( 'name' )->nullable();
            $table->text( 'title' )->nullable();
            $table->string( 'form_type' )->nullable();
            $table->string( 'html_class' )->nullable();
            $table->string( 'html_id' )->nullable();
            $table->text( 'restriction' )->nullable();
            $table->integer( 'min_length' )->nullable();
            $table->integer( 'max_length' )->nullable();
            $table->text( 'initial_value' )->nullable();
            $table->text( 'placeholder' )->nullable();
            $table->integer( 'columns' )->nullable();
            $table->string( 'file_type' )->nullable();
            $table->integer( 'file_capacity_limit' )->nullable();
            $table->integer( 'delete_flag' )->nullable();
            $table->text( 'length_error_msg' )->nullable();
            $table->integer( 'edit_flag' )->nullable();
            $table->text( 'required_error_msg' )->nullable();
            $table->text( 'restriction_error_msg' )->nullable();
            $table->text( 're_enter_error_msg' )->nullable();
            $table->text( 'forbidden_characters' )->nullable();
            $table->longText( 'description_above' )->nullable();
            $table->longText( 'description_below' )->nullable();
            $table->string( 'hankaku_zenkaku_automatic_conversion' )->nullable()->default('default');
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_blocks');
    }
}
