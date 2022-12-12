<?php

namespace App\Repository\Admin\Salary;

use App\Models\Salary;
use Illuminate\Http\Request;

interface ISalaryRepository
{
    public function saveSalary(Request $request, array $data);

    public function updateSalary(Request $request, Salary $salary, array $data);

    public function removeSalary(Salary $salary);
}