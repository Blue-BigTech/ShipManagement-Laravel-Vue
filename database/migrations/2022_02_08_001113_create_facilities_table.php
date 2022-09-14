<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facilities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('facility_name', 32)->comment('船設備');
            $table->string('icon_img', 128)->comment('設備アイコン')->nullable();
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
        Schema::table('facilities', function (Blueprint $table) {
            $table->dropForeign(['created_user_id']);
            $table->dropForeign(['updated_user_id']);
        });

        Schema::dropIfExists('facilities');
    }
}
