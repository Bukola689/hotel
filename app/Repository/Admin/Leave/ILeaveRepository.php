<?php

namespace App\Repository\Admin\Leave;

use App\Models\Leave;
use Illuminate\Http\Request;

interface ILeaveRepository
{
    public function saveLeave(Request $request, array $data);

    public function updateLeave(Request $request, Leave $leave, array $data);

    public function removeLeave(Leave $leave);
}