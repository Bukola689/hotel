<?php

namespace App\Repository\Admin\Department;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentRepository implements IDepartmentRepository
{
    public function saveDepartment(Request $request, array $data)
    {
      $department = new Department();
      $department->job_department = $request->input('job_department');
      $department->name = $request->input('name');
      $department->description = $request->input('description');
      $department->salary_range = $request->input('salary_range');
      $department->save();
    }

    public function updateDepartment(Request $request, Department $department, array $data)
    {
      $department->job_department = $request->input('job_department');
      $department->name = $request->input('name');
      $department->description = $request->input('description');
      $department->salary_range = $request->input('salary_range');
      $department->update();
    }

    public function removeDepartment(Department $department)
    {
        $department = $department->delete();
    }
}