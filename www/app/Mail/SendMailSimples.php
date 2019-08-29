<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Config;
class SendMailSimples extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($html,$from, $titulo, $config = null)
    {
        $this->html = $html;
        $this->remetente = $from;
        $this->titulo = $titulo;


        if (! is_null($config)) {
            // code get the smtp setting - $setting
                Config::set('mail.host', $config->mail_host);
                Config::set('mail.port', $config->mail_port);
                Config::set('mail.username', $config->mail_user);
                Config::set('mail.password', $config->mail_password);
                Config::set('mail.encryption', $config->mail_encryption);
        }


    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {


        return $this->from($this->remetente)
                ->subject($this->titulo)
                ->view('emails.simples', ["html" => $this->html]);
    }
}
