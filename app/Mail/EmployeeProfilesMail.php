<?php

namespace App\Mail;

use App\Models\Employee;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmployeeProfilesMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $profile;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Employee $profile)
    {
        $this->profile = $profile;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.auth.employeeprofile', [
            'name' => $this->profile->name,
        ]);
    }
}
