<?php

namespace App\Http\Controllers\V1\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payroll;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    public function payroll(Request $request)
    {
        $payroll = new Payroll();
        $payroll->employee_id = $request->input('employee_id');
        $payroll->department_id = $request->input('department_id');
        $payroll->staff_id = $request->input('staff_id');
        $payroll->salary_id = $request->input('salary_id');
        $payroll->leave_id = $request->input('leave_id');
        $payroll->payroll_date = Carbon::now();
        $payroll->report = $request->input('report');
        $payroll->amount = $request->input('amount');
        $payroll->save();

        return response()->json([
            'message' => true,
            'payroll' => $payroll
        ]);
    }
}
