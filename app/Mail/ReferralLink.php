<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReferralLink extends Mailable
{
    use Queueable, SerializesModels;

    public $link;
    public $key;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($link, $key)
    {
        $this->link = $link;
        $this->key = $key;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.referral.link');
    }
}
