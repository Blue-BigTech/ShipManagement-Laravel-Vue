<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    protected $requester;
    protected $fromEmail;
    protected $content;
    protected $sendDatetime;

    /**
     * Create a new message instance.
     *
     * @param mixed $requester
     * @param mixed $fromEmail
     * @param mixed $content
     * @param mixed $sendDatetime
     */
    public function __construct($requester, $content, $sendDatetime)
    {
        $this->requester = $requester;
        $this->content = $content;
        $this->sendDatetime = $sendDatetime;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from(config('mail.from.address'))
            ->subject('【ライブラリーについての問い合わせ】' . $this->requester->name . '様')
            ->view('emails.contact')
            ->with([
                'requester' => $this->requester,
                'content' => $this->content,
                'sendDatetime' => $this->sendDatetime,
            ]);
    }
}
