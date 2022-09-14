<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('view_no');
            $table->string('form_id')->nullable();
            $table->string('form_block_id')->nullable();
            $table->string('required')->nullable();
            $table->string('real_time_validation')->nullable();
            $table->string('re_enter_html_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_items');
    }
}
