<?php

namespace App\Repository\Admin\Staff;

use App\Models\Staff;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StaffRepository implements IStaffRepository
{
    public function saveStaff(Request $request, array $data)
    {
      //
    }

    public function updateStaff(Request $request, Staff $staff, array $data)
    {
      //
    }

    public function removeStaff(Staff $staff)
    {
        $staff = $staff->delete();
    }
}