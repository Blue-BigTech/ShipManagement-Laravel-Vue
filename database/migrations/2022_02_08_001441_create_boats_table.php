<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('lender_id')->unsigned()->index();
            $table->string('boat_name', 32)->comment('船名');
            $table->string('boat_name_kana', 32)->comment('船名(かな)');
            $table->string('fishing_area')->nullable()->comment('対応エリア');
            $table->integer('capacity')->comment('最大定員');
            $table->string('departure')->comment('出航時間');
            $table->string('fishing_point')->nullable()->comment('釣り座');
            $table->string('tackle')->nullable()->comment('貸タックル');
            $table->integer('length')->nullable()->comment('全長');
            $table->integer('weight')->nullable()->comment('重量');
            $table->text('caption_comment')->nullable()->comment('船長コメント');
            $table->string('boat_img_1', 128)->comment('船画像');
            $table->string('boat_img_2', 128)->comment('船画像')->nullable();
            $table->string('boat_img_3', 128)->comment('船画像')->nullable();
            $table->string('boat_img_4', 128)->comment('船画像')->nullable();
            $table->string('boat_img_5', 128)->comment('船画像')->nullable();
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['created_user_id']);
            $table->dropForeign(['updated_user_id']);
        });

        Schema::dropIfExists('boats');
    }
}
