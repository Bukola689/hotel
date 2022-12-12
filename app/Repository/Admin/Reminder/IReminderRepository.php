<?php

namespace App\Repository\Admin\Reminder;

use App\Models\Reminder;
use Illuminate\Http\Request;

interface IReminderRepository
{
    public function saveReminder(Request $request, array $data);

    public function updateReminder(Request $request, Reminder $reminder, array $data);

    public function removeReminder(Reminder $reminder);
}