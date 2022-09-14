<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'forms', function ( Blueprint $table ) {
            $table->bigIncrements( 'id' );
            $table->timestamps();
            $table->integer( 'view_flag' );
            $table->string( 'url' )->nullable();
            $table->text( 'name' )->nullable();
            $table->text( 'description' )->nullable();
            $table->text( 'mail_title' )->nullable();
            $table->string( 'theme_name' )->nullable();
            $table->text( 'admin_email' )->nullable();
            $table->text( 'bcc_email' )->nullable();
            $table->text( 'cc_email' )->nullable();
            $table->boolean( 'conf_mail_flag' )->default(false);
            $table->boolean( 'include_submissions' )->default(false);
            $table->boolean( 'include_submissions_admin_email' )->default(false);
            $table->boolean( 'save_data' )->default(false);
            $table->text( 'denied_ip' )->nullable();
            $table->text( 'denied_ip_host_error_msg' )->nullable();
            $table->string( 'language' )->nullable();
            $table->text( 'reply_mail_header_message' )->nullable();
            $table->text( 'reply_mail_footer_message' )->nullable();
            $table->text( 'input_form_header_message' )->nullable();
            $table->text( 'input_form_footer_message' )->nullable();
            $table->text( 'conf_form_header_message' )->nullable();
            $table->text( 'conf_form_footer_message' )->nullable();
            $table->text( 'error_form_header_message' )->nullable();
            $table->text( 'error_form_footer_message' )->nullable();
            $table->text( 'thanks_message' )->nullable();
            $table->text( 'google_re_captcha_site_key' )->nullable()->default(null);
            $table->text( 'google_re_captcha_secret_key' )->nullable()->default(null);
            $table->integer( 'google_re_captcha_bottom_px' )->nullable()->default(null);
            $table->boolean( 'beforeunload_flag' )->default(true);
            $table->boolean( 'enter_forbidden_flag' )->default(true);
            $table->boolean( 'submit_disabled_flag' )->default(true);
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forms');
    }
}
