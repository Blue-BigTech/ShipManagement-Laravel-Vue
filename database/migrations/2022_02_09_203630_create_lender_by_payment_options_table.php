<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLenderByPaymentOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lender_by_payment_options', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('lender_id')->unsigned()->index();
            $table->bigInteger('payment_option_id')->unsigned()->index();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('lender_id')
                ->references('id')
                ->on('lenders')
                ->onDelete('cascade');

            $table->foreign('payment_option_id')
                ->references('id')
                ->on('payment_options')
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
        Schema::table('lender_by_payment_options', function (Blueprint $table) {
            $table->dropForeign(['lender_id']);
            $table->dropForeign(['payment_option_id']);
        });

        Schema::dropIfExists('lender_by_payment_options');
    }
}
