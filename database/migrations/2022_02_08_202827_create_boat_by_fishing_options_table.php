<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoatByFishingOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boat_by_fishing_options', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('boat_id')->unsigned()->index();
            $table->bigInteger('fishing_option_id')->unsigned()->index();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('boat_id')
                ->references('id')
                ->on('boats')
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
        Schema::table('boat_by_fishing_options', function (Blueprint $table) {
            $table->dropForeign(['boat_id']);
            $table->dropForeign(['fishing_option_id']);
        });

        Schema::dropIfExists('boat_by_fishing_options');
    }
}
