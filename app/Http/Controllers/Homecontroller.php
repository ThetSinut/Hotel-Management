<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Contact; // Ensure you have a Contact model
use App\Models\Galary; // Ensure you have a Galary model


class Homecontroller extends Controller
{
    // public function index()
    // {
    //     return view('home.index');
    // }

    public function room_detaile($id)
    {
        $room = Room::find($id);
        return view('home.room_detaile', compact('room'));
    }

    public function add_booking(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $data = new Booking;
        $data->room_id = $id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->start_date = $request->start_date;
        $data->end_date = $request->end_date;

        if ($data->save()) {
            return redirect()->back()->with('success', 'Booking successful!');
        } else {
            return redirect()->back()->with('error', 'Booking failed. Please try again.');
        }
    }
    public function contact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'message' => 'required|string',
        ]);

        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;

        if ($contact->save()) {
            return redirect()->back()->with('success', 'Message sent successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to send message. Please try again.');
        }
    }
    public function our_rooms()
    {
        $room = Room::all();
        return view('home.our_rooms', compact('room'));
    }
    public function hotel_gallary()
    {
        $galary = galary::all();
        return view('home.hotel_gallary', compact('galary'));
    }
    public function contact_us()
    {
        return view('home.contact_us');
    }
}
