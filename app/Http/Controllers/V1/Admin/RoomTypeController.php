<?php

namespace App\Http\Controllers\V1\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoomType;
use App\Http\Resources\RoomTypeResource;
use App\Http\Requests\StoreRoomTypeRequest;
use App\Http\Requests\UpdateRoomTypeRequest;
use App\Repository\Admin\RoomType\RoomTypeRepository;

class RoomTypeController extends Controller
{
    private $roomType;

    public function __construct(RoomTypeRepository $roomType)
    {
        $this->roomType = $roomType;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roomtypes = RoomType::with('room')->orderBy('id', 'desc')->get();

        return RoomTypeResource::Collection($roomtypes);
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
     * @param  \App\Http\Requests\StoreRoomTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoomTypeRequest $request)
    {
        $data = $request->all();

        $this->roomType->saveRoomType($request, $data);

        return response()->json([
            'status' => 'RoomType Created Successfully !'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function show(RoomType $roomType)
    {
        return new  RoomTypeResource($roomType);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function edit(RoomType $roomType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoomTypeRequest  $request
     * @param  \App\Models\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoomTypeRequest $request, RoomType $roomType)
    {
      
        $data = $request->all();

        $this->roomType->updateRoomType($request, $roomType, $data);

        return response()->json([
            'status' => 'RoomTYpe Updated Successfully !',
            'roomType' => 'roomType'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoomType $roomType)
    {
        $this->roomType->removeRoomType($roomType);

        return response()->json([
            'status' => 'Room Type Deleted Successfully !',
        ]);
    }

    public function searchRoomType($search)
    {
        $roomType = RoomType::where('name', 'LIKE', '%' .$search. '%')->get();

        return response()->json([
            'roomType' => $roomType
        ]);
    }
}
