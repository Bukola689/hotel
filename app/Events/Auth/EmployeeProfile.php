<?php

namespace App\Events\Auth;

use App\Models\Employee;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EmployeeProfile
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $profile;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Employee $profile)
    {
        $this->profile = $profile;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
