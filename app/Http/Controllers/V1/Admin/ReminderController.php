<?php

namespace App\Http\Controllers\V1\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reminder;
use App\Repository\Admin\Reminder\ReminderRepository;
use Illuminate\Http\Request;

class ReminderController extends Controller
{

    private $reminder;

    public function __construct(ReminderRepository $reminder)
    {
        $this->reminder = $reminder;
    }


    public function index()
    {
        $reminders =  Reminder::orderBy('id', 'desc')->get();

        return response()->json($reminders);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'booking_id' => 'required',
            'type' => 'required',
            'details' => 'required',
            'reminder_date' => 'required',
        ]);

        $data = $request->all();

        $reminder = $this->reminder->saveReminder($request, $data);

        return response()->json([
            'status' => $reminder,
            'message' => 'Reminder Created Successfully !'
        ]);
    }

    public function show(Reminder $reminder)
    {
        return response()->json($reminder);
    }

    public function update(Request $request, Reminder $reminder)
    {
        $data = $request->validate([
            'booking_id' => 'required',
            'type' => 'required',
            'details' => 'required',
            'reminder_date' => 'required',
        ]);

        $data = $request->all();

        $reminder = $this->reminder->updateReminder($request, $reminder, $data);

        return response()->json([
            'status' => $reminder,
            'message' => 'Reminder Updated Successfully !'
        ]);
    }

    public function destroy(Reminder $reminder)
    {
        $this->reminder->removeReminder($reminder);

        return response()->json([
            'message' => 'Reminder Removed Successfully'
        ]);
    }
}
