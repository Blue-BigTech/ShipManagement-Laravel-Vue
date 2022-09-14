<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;

class TrimStrings extends Middleware
{
    /**
     * The names of the attributes that should not be trimmed.
     *
     * @var array
     */
    protected $except = [
        'password',
        'password_confirmation',
        'input_form_header_message',
        'input_form_footer_message',
        'conf_form_header_message',
        'conf_form_footer_message',
        'error_form_header_message',
        'error_form_footer_message',
        'reply_mail_header_message',
        'reply_mail_footer_message',
        'thanks_message',
    ];
}
