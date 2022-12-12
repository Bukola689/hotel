<?php

namespace App\Repository\Admin\Department;

use App\Models\Department;
use Illuminate\Http\Request;

interface IDepartmentRepository
{
    public function saveDepartment(Request $request, array $data);

    public function updateDepartment(Request $request, Department $department, array $data);

    public function removeDepartment(Department $department);
}