<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 32);
            $table->string('name_kana', 32);
            $table->string('email', 64);
            $table->string('password', 64);
            $table->bigInteger('role_id')->unsigned()->index();
            $table->string('access_token', 64)->nullable();
            $table->datetime('login_app_datetime')->nullable();
            $table->bigInteger('created_user_id')->unsigned()->nullable();
            $table->bigInteger('updated_user_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('no action');

            $table->foreign('created_user_id')
                ->references('id')
                ->on('users')
                ->onDelete('no action');

            $table->foreign('updated_user_id')
                ->references('id')
                ->on('users')
                ->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
            $table->dropForeign(['created_user_id']);
            $table->dropForeign(['updated_user_id']);
        });

        Schema::dropIfExists('users');
    }
}
