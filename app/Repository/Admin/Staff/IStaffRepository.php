<?php

namespace App\Repository\Admin\Staff;

use App\Models\Staff;
use Illuminate\Http\Request;

interface IStaffRepository
{
    public function saveStaff(Request $request, array $data);

    public function updateStaff(Request $request, Staff $staff, array $data);

    public function removeStaff(Staff $staff);
}