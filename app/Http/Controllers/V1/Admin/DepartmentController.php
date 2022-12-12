<?php

namespace App\Http\Controllers\V1\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Http\Resources\DepartmentResource;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Repository\Admin\Department\DepartmentRepository;

class DepartmentController extends Controller
{
    private $department;

    public function __construct(DepartmentRepository $department)
    {
        $this->department = $department;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::orderBy('id', 'desc')->paginate(5);

        return DepartmentResource::Collection($departments);
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
     * @param  \App\Http\Requests\StoreDepartmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDepartmentRequest $request)
    {
       $data = $request->all();

       $this->department->saveDepartment($request, $data);

        return response()->json([
            'message' => 'Department Saved Sucessfully !'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        return new DepartmentResource($department);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDepartmentRequest  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        $data = $request->all();

        $this->department->updateDepartment($request, $department, $data);

        return response()->json([
            'message' => 'Department Updated Sucessfully !'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(Department $department)
    {
       $this->department->removeDepartment($department);

        return response()->json([
            'message' => 'Department Deleted Successfully !'
        ]);
    }

    public function searchDepartment($search)
    {
        $department = Department::where('job_department', 'LIKE', '%' .$search. '%')->get();

        return response()->json([
            'message' => $department
        ]);
    }
}
