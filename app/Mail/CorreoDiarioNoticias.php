<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Post;
class CorreoDiarioNoticias extends Mailable
{
    use Queueable, SerializesModels;
    public $noticias;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($posts)
    {
        $this->noticias = $posts;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.noticiasdiarias');
    }
}
