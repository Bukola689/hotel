<?php

namespace App\Http\Controllers\V1\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Carbon\Carbon;
use App\Http\Resources\EmployeeResource;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Repository\Admin\Employee\EmployeeRepository;

class EmployeeController extends Controller
{
    private $employee;

    public function __construct(EmployeeRepository $employee)
    {
        $this->employee = $employee;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $employees = Employee::orderBy('id', 'desc')->get();

        return EmployeeResource::Collection($employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {
        $data = $request->all();

        $this->employee->saveEmployee($request, $data);

        return response()->json([
            'status' => 'Employee Created Successfully',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return new EmployeeResource($employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeeRequest  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {

      $data = $request->all();

      $this->employee->updateEmployee($request, $employee,$data);

      return response()->json([
          'status' => 'Employee Updated Successfully',
      ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee = $employee->delete();

        return response()->json([
            'status' => 'Employee Removed Successfully',
            'employee' => $employee
        ]);
    }

    public function searchEmployee($search)
    {
        $employee = Employee::where('name', 'LIKE', '%' .$search. '%')->get();

        return response()->json([
            'employee' => $employee
        ]);
    }
}
