<?php

namespace App\Http\Controllers\V1\Admin;

use App\Http\Controllers\Controller;
use App\Models\Leave;
use App\Http\Resources\LeaveResource;
use App\Http\Requests\StoreLeaveRequest;
use App\Http\Requests\UpdateLeaveRequest;
use App\Repository\Admin\Leave\LeaveRepository;

class LeaveController extends Controller
{
    private $leave;

    public function __construct(LeaveRepository $leave)
    {
        $this->leave = $leave;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leaves = Leave::orderBy('id', 'desc')->paginate(5);

        return  LeaveResource::Collection($leaves);

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
     * @param  \App\Http\Requests\StoreLeaveRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLeaveRequest $request)
    {
      
        $data = $request->all();

        $this->leave->saveLeave($request, $data);

        return response()->json([
            'message' => 'Leave Saved Successfully !'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function show(Leave $leave)
    {
         return new LeaveResource($leave);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function edit(Leave $leave)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLeaveRequest  $request
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLeaveRequest $request, Leave $leave)
    {
      
        $data = $request->all();

        $this->leave->updateLeave($request, $leave, $data);

        return response()->json([
            'message' => 'Leave Updated Successfully !'
        ]);
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leave $leave)
    {
       $this->leave->removeLeave($leave);

        return response()->json([
            'message' => 'Leave Deleted Successfully'
        ]);
    }

    public function searchLeave($search)
    {
        $leave = Leave::where('leave', 'LIKE', '%' .$search. '%')->get();

        return response()->json([
            'result' => $leave
        ]);
    }
}
