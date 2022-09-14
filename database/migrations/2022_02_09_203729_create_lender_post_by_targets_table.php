<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLenderPostByTargetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lender_post_by_targets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('lender_post_id')->unsigned()->index();
            $table->bigInteger('target_id')->unsigned()->index();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('lender_post_id')
                ->references('id')
                ->on('lender_posts')
                ->onDelete('cascade');

            $table->foreign('target_id')
                ->references('id')
                ->on('targets')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lender_post_by_targets', function (Blueprint $table) {
            $table->dropForeign(['lender_post_id']);
            $table->dropForeign(['target_id']);
        });

        Schema::dropIfExists('lender_post_by_targets');
    }
}
