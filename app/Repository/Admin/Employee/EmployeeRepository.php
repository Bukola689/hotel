<?php

namespace App\Repository\Admin\Employee;

use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EmployeeRepository implements IEmployeeRepository
{
    public function saveEmployee(Request $request, array $data)
    {
        $image = $request->image;
  
        $originalName = $image->getClientOriginalName();
  
        $image_new_name = 'image-' .time() .  '-' .$originalName;
  
        $image->move('employees/image', $image_new_name);

        $employee = new Employee();
        $employee->name = $request->input('name');
        $employee->d_o_b = $request->input('d_o_b');
        $employee->gender = $request->input('gender');
        $employee->nationality = $request->input('nationality');
        $employee->state = $request->input('state');
        $employee->join_date = Carbon::now();
        $employee->phone_number = $request->input('phone_number');
        $employee->email = $request->input('email');
        $employee->image = 'employees/image/' . $image_new_name;
        $employee->address = $request->input('address');
        $employee->save();

    }

    public function updateEmployee(Request $request, Employee $employee, array $data)
    {
        if( $request->hasFile('image')) {
  
            $image = $request->image;
  
            $originalName = $image->getClientOriginalName();
    
            $image_new_name = 'image-' .time() .  '-' .$originalName;
    
            $image->move('images/image', $image_new_name);
  
            $employee->image = 'images/image/' . $image_new_name;
      }

      $employee->name = $request->input('name');
      $employee->d_o_b = $request->input('d_o_b');
      $employee->gender = $request->input('gender');
      $employee->nationality = $request->input('nationality');
      $employee->state = $request->input('state');
      $employee->join_date = Carbon::now();
      $employee->phone_number = $request->input('phone_number');
      $employee->email = $request->input('email');
      $employee->address = $request->input('address');
      $employee->update();
    }

    public function removeEmployee(Employee $employee)
    {
        $employee = $employee->delete();
    }
}