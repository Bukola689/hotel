<?php

namespace App\Repository\Admin\RoomType;

use App\Models\RoomType;
use Illuminate\Http\Request;

interface IRoomTypeRepository
{
    public function saveRoomType(Request $request, array $data);

    public function updateRoomType(Request $request, RoomType $roomType, array $data);

    public function removeRoomType(RoomType $roomType);
}