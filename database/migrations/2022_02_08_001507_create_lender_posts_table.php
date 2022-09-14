<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLenderPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lender_posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('lender_id')->unsigned()->index();
            $table->string('title', 32);
            $table->text('comment');
            $table->string('post_img_1', 128);
            $table->string('post_img_2', 128)->nullable();
            $table->string('post_img_3', 128)->nullable();
            $table->string('post_img_4', 128)->nullable();
            $table->string('post_img_5', 128)->nullable();
            $table->string('post_img_6', 128)->nullable();
            $table->bigInteger('created_user_id')->unsigned()->nullable();
            $table->bigInteger('updated_user_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();

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
        Schema::dropIfExists('lender_comments');
    }
}
