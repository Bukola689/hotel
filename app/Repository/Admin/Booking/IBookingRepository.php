<?php

namespace App\Repository\Admin\Booking;

use App\Models\Booking;
use Illuminate\Http\Request;

interface IBookingRepository
{
    public function saveBooking(Request $request, array $data);

    public function updateBooking(Request $request, Booking $booking, array $data);

    public function removeBooking(Booking $booking);
}