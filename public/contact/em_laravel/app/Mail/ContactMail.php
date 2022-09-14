<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable {
  use Queueable, SerializesModels;

  protected $form_info;
  protected $request;
  protected $form_req;
  protected $file;

  /**
   * Create a new message instance.
   *
   * @param $form_info
   * @param $request
   * @param $form_req
   * @param null $file
   */
  public function __construct( $form_info, $request, $form_req, $file = null ) {
    $this->form_info = $form_info;
    $this->request   = $request;
    $this->form_req  = $form_req;
    $this->file      = $file;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build() {
    if ( $this->form_info->to == "user" ) {
      $this->from( $this->form_info->admin_email );
    }
    else {
      if ( $this->form_info->user_email ) {
        $this->from( $this->form_info->user_email );
      }
      else {
        $this->from( $this->form_info->admin_email );
      }
    }

    $this->subject( $this->form_info->mail_title );
    $this->text( $this->form_info->template );
    $this->with( [
                   'request'                         => $this->request,
                   'form_req'                        => $this->form_req,
                   'include_submissions'             => $this->form_info->include_submissions,
                   'include_submissions_admin_email' => $this->form_info->include_submissions_admin_email,
                   'reply_mail_header_message'       => $this->form_info->reply_mail_header_message,
                   'reply_mail_footer_message'       => $this->form_info->reply_mail_footer_message
                 ] );

    foreach ( $this->file as $file ) {
      $this->attach( $file->getRealPath(), array(
        'as'   => $file->getClientOriginalName(),
        'mime' => $file->getMimeType()
      ) );
    }

    if ( $this->form_info->to == "admin" && $this->form_info->cc_email ) {
      $email_ar = explode( ",", $this->form_info->cc_email );
      $this->cc( $email_ar );
    }
    if ( $this->form_info->to == "admin" && $this->form_info->bcc_email ) {
      $email_ar = explode( ",", $this->form_info->bcc_email );
      $this->bcc( $email_ar );
    }

    return $this;
  }
}
