<?php

namespace App\Repository\Admin\Reminder;

use App\Models\Reminder;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReminderRepository implements IReminderRepository
{
    public function saveReminder(Request $request, array $data)
    {
        $reminder = new Reminder();
        $reminder->booking_id = $request->input('booking_id');
        $reminder->type = $request->input('type');
        $reminder->details = $request->input('details');
        $reminder->reminder_date = $request->input('reminder_date');
        $reminder->status = 'Active';
        $reminder->save();
    }

    public function updateReminder(Request $request, Reminder $reminder, array $data)
    {
        $reminder->booking_id = $request->input('booking_id');
        $reminder->type = $request->input('type');
        $reminder->details = $request->input('details');
        $reminder->reminder_date = $request->input('reminder_date');
        $reminder->status = 'Active';
        $reminder->update();
    }

    public function removeReminder(Reminder $reminder)
    {
        $reminder = $reminder->delete();
    }
}