<?php

namespace App\Repository\Admin\Salary;

use App\Models\Salary;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SalaryRepository implements ISalaryRepository
{
    public function saveSalary(Request $request, array $data)
    {
        $salary = new Salary();
        $salary->department_id = $request->input('department_id');
        $salary->amount = $request->input('amount');
        $salary->bonus = $request->input('bonus');
        $salary->save();
    }

    public function updateSalary(Request $request, Salary $salary, array $data)
    {
        $salary->department_id = $request->input('department_id');
        $salary->amount = $request->input('amount');
        $salary->bonus = $request->input('bonus');
        $salary->update();
    }

    public function removeSalary(Salary $salary)
    {
        $salary = $salary->delete();
    }
}