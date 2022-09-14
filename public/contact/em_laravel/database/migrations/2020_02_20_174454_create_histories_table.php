<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('form_id');
            $table->string('form_name')->nullable();
            $table->string('admin_email')->nullable();
            $table->string('user_email')->nullable();
            $table->text('mail_title')->nullable();
            $table->text('content')->nullable();
            $table->text('theme_name')->nullable();
            $table->text('bcc_email')->nullable();
            $table->text('cc_email')->nullable();
            $table->integer('conf_mail_flag');
            $table->integer('include_submissions');
            $table->integer('include_submissions_admin_email');
            $table->text('url')->nullable();
            $table->text('template')->nullable();
            $table->text('attach_files')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('histories');
    }
}
