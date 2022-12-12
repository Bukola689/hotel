<?php

namespace App\Repository\Admin\Room;

use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RoomRepository implements IRoomRepository
{
    public function saveRoom(Request $request, array $data)
    {
        $file_upload = $request->file_upload;
  
        $originalName = $file_upload->getClientOriginalName();
  
        $image_new_name = 'file_upload-' .time() .  '-' .$originalName;
  
        $file_upload->move('rooms/file_upload', $image_new_name);

        $room = new Room();
        $room->room_number = $request->input('room_number');
        $room->ac_no_ac = $request->input('ac_no_ac');
        $room->room_type_id = $request->input('room_type_id');
        $room->charges_for_cancellation = $request->input('charges_for_cancellation');
        $room->food = $request->input('food');
        $room->bed_count = $request->input('bed_count');
        $room->rent = $request->input('rent');
        $room->phone_number = $request->input('phone_number');
        $room->file_upload = 'rooms/file_upload/' . $image_new_name;
        $room->message = $request->input('message');
        //$room->status = $request->input('status');
        $room->save();
    }

    public function updateRoom(Request $request, Room $room, array $data)
    {
        if( $request->hasFile('file_upload')) {
  
            $file_upload = $request->file_upload;
  
            $originalName = $file_upload->getClientOriginalName();
    
            $image_new_name = 'file_upload-' .time() .  '-' .$originalName;
    
            $file_upload->move('rooms/file_upload', $image_new_name);
  
            $room->file_upload = 'rooms/file_upload/' . $image_new_name;
      }

        $room->room_number = $request->input('room_number');
        $room->ac_no_ac = $request->input('ac_no_ac');
        $room->room_type_id = $request->input('room_type_id');
        $room->charges_for_cancellation = $request->input('charges_for_cancellation');
        $room->food = $request->input('food');
        $room->bed_count = $request->input('bed_count');
        $room->rent = $request->input('rent');
        $room->phone_number = $request->input('phone_number');
        $room->status = $request->input('status');
        $room->update();

    }

    public function removeRoom(Room $room)
    {
        $room = $room->delete();
    }
}