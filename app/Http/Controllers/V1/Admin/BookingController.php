<?php

namespace App\Http\Controllers\V1\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Http\Resources\BookingResource;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Repository\Admin\Booking\BookingRepository;

class BookingController extends Controller
{
    private $booking;

    public function __construct(BookingRepository $booking)
    {
        $this->booking = $booking;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::orderBy('id', 'desc')->paginate(5);

        return BookingResource::Collection($bookings);
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
     * @param  \App\Http\Requests\StoreBookingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookingRequest $request)
    {
       $data = $request->all();

       $this->booking->saveBooking($request, $data);

        return response()->json([
            'message' => 'Booking Saved Successfully !'
        ]);
  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        return new BookingResource($booking);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookingRequest  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
       $data = $request->all();

       $this->booking->updateBooking($request, $booking, $data);

        return response()->json([
            'message' => 'Booking Saved Successfully !',
            'booking' => $booking
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
       $this->booking->removeBooking($booking);

        return response()->json([
            'status' => 'Booking Removed Successfully',
            'booking' => $booking
        ]);
    }

    public function searchBooking($search)
    {
        $booking = Booking::where('name', 'LIKE', '%' .$search. '%')->get();

        return response()->json([
            'booking' => $booking
        ]);
    }
}
