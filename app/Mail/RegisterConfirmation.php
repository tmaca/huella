<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\User;

class RegisterConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $confirmLink;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->email = $user->email;
        $this->confirmLink = $user->email_code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config("mail.from.address"))
                ->subject("Confirmación de registro, " . config("app.name"))
                ->view('mails.confirmRegistration');
    }
}
