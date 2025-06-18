<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Galary; // Ensure you have a Galary model
use App\Models\Contact; // Ensure you have a Contact model
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to access this page.');
        }

        $usertype = Auth::user()->usertype;

        switch ($usertype) {
            case 'user':
                $room = Room::all();
                $galary = Galary::all(); // Ensure you have a Galary model
                return view('home.index', compact('room', 'galary'));
            case 'admin':
                return view('admin.index');
            default:
                return redirect()->back()->with('error', 'You are not authorized to access this page.');
        }
    }
    public function home()
    {
        $room = Room::all();
        $galary = Galary::all(); // Ensure you have a Galary model
        return view('home.index', compact('room', 'galary'));
    }

    public function create_room()
    {
        return view('admin.create_room');
    }
    // Add room
    public function add_room(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'wifi' => 'required|boolean',
            'type' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = new Room;
        $data->room_title = $request->title;
        $data->description = $request->description;
        $data->room_price = $request->price;
        $data->wifi = $request->wifi;
        $data->room_type = $request->type;

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/rooms'), $imageName);
            $data->image = 'images/rooms/' . $imageName;
        }

        $data->save();
        return redirect()->back()->with('success', 'Room added successfully!');
    }

    public function view_room()
    {
        $data = Room::all();
        return view('admin.view_room', compact('data'));
    }
    public function delete_room($id)
    {
        $data = Room::find($id);
        if ($data) {
            $data->delete();
            return redirect()->back()->with('success', 'Room deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Room not found.');
        }
    }
    public function update_room($id)
    {
        $data = Room::find($id);
        if ($data) {
            return view('admin.update_room', compact('data'));
        } else {
            return redirect()->back()->with('error', 'Room not found.');
        }
    }
    public function edit_room(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'wifi' => 'required|boolean',
            'type' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = Room::find($id);
        if ($data) {
            $data->room_title = $request->title;
            $data->description = $request->description;
            $data->room_price = $request->price;
            $data->wifi = $request->wifi;
            $data->room_type = $request->type;

            // Handle image upload
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($data->image && file_exists(public_path($data->image))) {
                    unlink(public_path($data->image));
                }
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images/rooms'), $imageName);
                $data->image = 'images/rooms/' . $imageName;
            }

            $data->save();
            return redirect()->back()->with('success', 'Room updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Room not found.');
        }
    }
    public function bookings()
    {
        $bookings = Booking::with('room')->get(); // <-- load related room data
        return view('admin.booking', compact('bookings'));
    }
    public function delete_booking($id)
    {
        $booking = Booking::find($id);
        if ($booking) {
            $booking->delete();
            return redirect()->back()->with('success', 'Booking deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Booking not found.');
        }
    }
    // public function update_booking($id)
    // {
    //     $booking = Booking::find($id);
    //     if ($booking) {
    //         return view('admin.update_booking', compact('booking'));
    //     } else {
    //         return redirect()->back()->with('error', 'Booking not found.');
    //     }
    // }
    public function approve_book($id)
    {
        $booking = Booking::find($id);
        if ($booking) {
            $booking->status = 'approve';
            $booking->save();
            return redirect()->back()->with('success', 'Booking approved successfully!');
        } else {
            return redirect()->back()->with('error', 'Booking not found.');
        }
    }
    public function rejected_book($id)
    {
        $booking = Booking::find($id);
        if ($booking) {
            $booking->status = 'rejected';
            $booking->save();
            return redirect()->back()->with('success', 'Booking rejected successfully!');
        } else {
            return redirect()->back()->with('error', 'Booking not found.');
        }
    }
    public function view_galary()
    {
        $galary = galary::all(); // Make sure you have a Galary model
        return view('admin.galary', compact('galary'));
    }
    public function upload_galary(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = new Galary;

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('image/galary'), $imageName);
            $data->image = 'image/galary/' . $imageName;
        }

        $data->save();
        return redirect()->back()->with('success', 'Image uploaded successfully!');
    }
    public function delete_galary($id)
    {
        $data = Galary::find($id);
        if ($data) {
            // Delete the image file if it exists
            if (file_exists(public_path($data->image))) {
                unlink(public_path($data->image));
            }
            $data->delete();
            return redirect()->back()->with('success', 'Image deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Image not found.');
        }
    }
    public function all_message(){
        $data = Contact::all();
        return view('admin.all_message', compact('data'));
    }
    public function send_email($id)
    {
        $data = Contact::find($id);
        if ($data) {
            return view('admin.send_email', compact('data'));
        } else {
            return redirect()->back()->with('error', 'Message not found.');
        }
    }
    public function mail(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        $data = Contact::find($id);
        $dedails = [
            'Greeting' => $request->greeting,
            'body' => $request->body,
            'action_text' => $request->action_text,
            'action_url' => $request->action_url,
            'endline' => $request->endline,
        ];
        Notification::send($data, new SendEmailNotification($dedails));
        return redirect()->back()->with('success', 'Email sent successfully!');
    }
    
    
}