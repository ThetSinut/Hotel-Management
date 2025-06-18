<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\HomeController;

Route::get('/',[adminController::class, 'home']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/home', [adminController::class, 'index'])->name('home');

Route::get('/create_room',[adminController::class, 'create_room']);

Route::post('/add_room',[adminController::class, 'add_room']);

Route::get('/view_room',[adminController::class, 'view_room']);

Route::get('/delete_room/{id}',[adminController::class, 'delete_room']);

Route::get('/update_room/{id}',[adminController::class, 'update_room']);

Route::post('/edit_room/{id}',[adminController::class, 'edit_room']);

Route::get('/room_detaile/{id}',[HomeController::class, 'room_detaile']);

Route::post('/add_booking/{id}',[HomeController::class, 'add_booking']);

Route::get('/bookings',[AdminController::class, 'bookings']);

Route::get('/delete_booking/{id}',[AdminController::class, 'delete_booking']);

Route::get('/approve_book/{id}',[AdminController::class, 'approve_book']);

Route::get('/rejected_book/{id}',[AdminController::class, 'rejected_book']);

Route::get('/view_galary',[AdminController::class, 'view_galary']);

Route::post('/upload_galary',[AdminController::class, 'upload_galary']);

Route::get('/delete_galary/{id}',[AdminController::class, 'delete_galary']);

Route::post('/contact',[HomeController::class, 'contact']);

Route::get('/all_message',[AdminController::class, 'all_message']);

Route::get('/send_email/{id}',[AdminController::class, 'send_email']);

Route::post('/mail/{id}',[AdminController::class, 'mail']);

Route::get('/our_rooms',[HomeController::class, 'our_rooms']);

Route::get('/hotel_gallary',[HomeController::class, 'hotel_gallary']);

Route::get('/contact_us',[HomeController::class, 'contact_us']);
