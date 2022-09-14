<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLenderPostByFishingOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lender_post_by_fishing_options', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('lender_post_id')->unsigned()->index();
            $table->bigInteger('fishing_option_id')->unsigned()->index();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('lender_post_id')
                ->references('id')
                ->on('lender_posts')
                ->onDelete('cascade');

            $table->foreign('fishing_option_id')
                ->references('id')
                ->on('fishing_options')
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
        Schema::table('lender_post_by_fishing_options', function (Blueprint $table) {
            $table->dropForeign(['lender_post_id']);
            $table->dropForeign(['fishing_option_id']);
        });

        Schema::dropIfExists('lender_post_by_fishing_options');
    }
}
