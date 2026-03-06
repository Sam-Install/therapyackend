<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{

    // GET bookings for dashboard
    public function index()
    {
        $bookings = Booking::latest()->get();

        return response()->json([
            'status' => true,
            'bookings' => $bookings
        ]);
    }


    // STORE booking from website form
    public function store(Request $request)
    {

        $request->validate([
            'first_name' => 'required',
            'second_name' => 'required',
            'email' => 'required|email',
            'date' => 'required'
        ]);

        $booking = Booking::create([
            'first_name' => $request->first_name,
            'second_name' => $request->second_name,
            'email' => $request->email,
            'date' => $request->date,
            'message' => $request->message
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Booking submitted successfully',
            'booking' => $booking
        ]);
    }


    // APPROVE booking
    public function approve($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->status = "Approved";
        $booking->save();

        return response()->json([
            'status' => true,
            'message' => 'Booking approved'
        ]);
    }


    // DENY booking
    public function deny($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->status = "Denied";
        $booking->save();

        return response()->json([
            'status' => true,
            'message' => 'Booking denied'
        ]);
    }

}