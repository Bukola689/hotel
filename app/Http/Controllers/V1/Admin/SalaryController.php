<?php

namespace App\Http\Controllers\V1\Admin;

use App\Http\Controllers\Controller;
use App\Models\Salary;
use App\Http\Resources\SalaryResource;
use App\Http\Requests\StoreSalaryRequest;
use App\Http\Requests\UpdateSalaryRequest;
use App\Repository\Admin\Salary\SalaryRepository;

class SalaryController extends Controller
{

    private $salary;

    public function __construct(SalaryRepository $salary)
    {
        $this->salary = $salary;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salaries = Salary::with('department')->orderBy('id', 'desc')->get();

        return  SalaryResource::Collection($salaries);

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
     * @param  \App\Http\Requests\StoreSalaryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSalaryRequest $request)
    {
       $data = $request->all();

       $this->salary->saveSalary($request, $data);

        return response()->json([
            'message' => 'Salary Saved Successfully !'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function show(Salary $salary)
    {
        return new SalaryResource($salary);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function edit(Salary $salary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSalaryRequest  $request
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSalaryRequest $request, Salary $salary)
    {
      
        $data = $request->all();

        $this->salary->updateSalary($request, $salary, $data);

        return response()->json([
            'message' => 'Salary Updated Successfully !'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salary $salary)
    {
       $this->salary->removeSalary($salary);

        return response()->json([
            'message' => 'Salary Deleted Successfully'
        ]);
    }

    public function searchSalary($search)
    {
        $salary = Salary::where('amount', 'LIKE', '%' .$search. '%')->get();

        return response()->json([
            'result' => $salary
        ]);
    }
}
