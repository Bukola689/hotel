<?php

namespace App\Repository\Admin\Employee;

use App\Models\Employee;
use Illuminate\Http\Request;

interface IEmployeeRepository
{
    public function saveEmployee(Request $request, array $data);

    public function updateEmployee(Request $request, Employee $employee, array $data);

    public function removeEmployee(Employee $employee);
}