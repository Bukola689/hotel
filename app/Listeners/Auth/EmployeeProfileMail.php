<?php

namespace App\Listeners\Auth;

use App\Mail\EmployeeProfilesMail;
use App\Models\Employee;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class EmployeeProfileMail
{
    private $profile;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Employee $profile)
    {
        $this->profile = $profile;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Mail::to($event->profile)->send(new EmployeeProfilesMail($event->profile));
    }
}
