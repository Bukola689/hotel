<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordResetMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public $reset;

    public $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, PasswordReset $reset)
    {
        $reset->token;

        $user = $this->url = config('settings.frontend_url')."/reset-password?";
        $this->user = $user;
        $this->reset = $reset;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('password.reset-passsword');
    }
}
