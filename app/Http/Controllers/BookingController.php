<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;
use Session;
use App\Http\Resources\Booking as BookingResource;

class BookingController extends Controller
{

    private  $booking;

    public function __construct ()
    {
        $this->booking = new Booking();
    }

    public function index()
    {
        $bookings = Booking::all();
        return BookingResource::collection($bookings);
       

    }

    public function store(Request $request)
    {
       
        $booking=$request->isMethod('put')? Booking::findOrFail($request->booking_id):$this->booking;
        //
        $booking->lastname=$request->lastname;
        $booking->firstname=$request->firstname;
        $booking->time=$request->time;
        $booking->location=$request->location;
        $booking->email=$request->email;
        $booking->tel=$request->tel;
        $booking->date=$request->date;
        $booking->message=$request->message;
        $booking->service_id=$request->service_id;

        if( $booking->save()){
            return new BookingResource($booking);
        }

    }

    public function show($id)
    {
        return new BookingResource(Booking::findOrFail($id));
    }

    public function destroy($id)
    {
        return new BookingResource(Booking::findOrFail($id));
    }
}
