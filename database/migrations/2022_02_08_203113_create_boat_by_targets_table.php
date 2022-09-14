<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoatByTargetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boat_by_targets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('boat_id')->unsigned()->index();
            $table->bigInteger('target_id')->unsigned()->index();
            $table->integer('season_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('boat_id')
                ->references('id')
                ->on('boats')
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
        Schema::table('boat_by_targets', function (Blueprint $table) {
            $table->dropForeign(['boat_id']);
            $table->dropForeign(['target_id']);
        });

        Schema::dropIfExists('boat_by_targets');
    }
}
