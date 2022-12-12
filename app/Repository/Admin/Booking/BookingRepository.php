<?php

namespace App\Repository\Admin\Booking;

use App\Models\Booking;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingRepository implements IBookingRepository
{
    public function saveBooking(Request $request, array $data)
    {
        $image = $request->image;
  
        $originalName = $image->getClientOriginalName();
  
        $image_new_name = 'image-' .time() .  '-' .$originalName;
  
        $image->move('bookings/image', $image_new_name);
  
        $booking = new Booking();
       // $booking->booking_id = Str::uuid();
        $booking->name = $request->input('name');
        $booking->room_type_id = $request->input('room_type_id');
        $booking->total_number = $request->input('total_number');
        $booking->gender = $request->input('gender');
        $booking->id_card = $request->input('id_card');
        $booking->date = $request->input('date');
        $booking->time = $request->input('time');
        $booking->checkin = Carbon::now();
        $booking->checkout = Carbon::now();
        $booking->email = $request->input('email');
        $booking->phone_number = $request->input('phone_number');
        $booking->image = 'bookings/image/' . $image_new_name;
        $booking->address = $request->input('address');
        $booking->message = $request->input('message');
        $booking->status = $request->input('status');
        $booking->save();
    }

    public function updateBooking(Request $request, Booking $booking, array $data)
    {
        $booking->checkout = Carbon::now();
        $booking->update();
    }

    public function removeBooking(Booking $booking)
    {
        $booking = $booking->delete();
    }
}