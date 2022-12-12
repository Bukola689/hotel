<?php

namespace App\Repository\Admin\RoomType;

use App\Models\RoomType;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RoomTypeRepository implements IRoomTypeRepository
{
    public function saveRoomType(Request $request, array $data)
    {
        $roomType = new RoomType();
        $roomType->roomtype = $request->input('roomtype');
        $roomType->cost = $request->input('cost');
        $roomType->description = $request->input('description');
        $roomType->save();
    }

    public function updateRoomType(Request $request, RoomType $roomType, array $data)
    {
        $roomType->roomtype = $request->input('roomtype');
        $roomType->cost = $request->input('cost');
        $roomType->description = $request->input('description');
        $roomType->update();

    }

    public function removeRoomType(RoomType $roomType)
    {
        $roomType = $roomType->delete();
    }
}