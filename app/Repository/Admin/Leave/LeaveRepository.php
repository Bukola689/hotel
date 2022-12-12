<?php

namespace App\Repository\Admin\Leave;

use App\Models\Leave;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LeaveRepository implements ILeaveRepository
{
    public function saveLeave(Request $request, array $data)
    {
        $leave = new Leave();
        $leave->employee_id = $request->input('employee_id');
        $leave->leave_date = $request->input('leave_date');
        $leave->status = 'pending';
        $leave->reason = $request->input('reason');
        $leave->save();
    }

    public function updateLeave(Request $request, Leave $leave, array $data)
    {
        if($leave) {
            $leave->status = $request->leave['status'] ? 'Approved' : 'Pending';
            $leave->save();
        }
    }

    public function removeLeave(Leave $leave)
    {
        $leave = $leave->delete();
    }
}