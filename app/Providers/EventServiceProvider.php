<?php

namespace App\Providers;

use App\Events\UserLoggedIn;
use App\Events\UserRegistered;
use App\Listeners\UserLoggedInMail;
use App\Listeners\UserRegisteredMail;
use App\Mail\RegisteredMail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        UserRegistered::class => [
            UserRegisteredMail::class
        ],

        UserLoggedIn::class => [
            UserLoggedInMail::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
