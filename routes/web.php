<?php

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/home', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('user.dashboard')->middleware('auth', 'registered');

Route::get('/book', function () {
    return view('book');
})->name('book')->middleware('auth', 'registered');

Route::post('/booking', function (Request $request) {
    $data = $request->validate([
        'event_type' => 'required',
        'event_date' => 'required|date',
        'event_time' => 'required|date_format:H:i',
        'event_address' => 'required',
    ]);

    $data['user_id'] = Auth::user()->id;
    $data['name'] = Auth::user()->name;
    $data['email'] = Auth::user()->email;
    $data['phone_number'] = Auth::user()->phone_number;

    Booking::create($data);

    return Redirect::route('home')->with('success', 'Booking created successfully');
})->name('booking.store')->middleware('auth', 'registered');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/admin', function () {
    // Retrieve all bookings (you may adjust the query based on your requirements)
    $bookings = Booking::all();
    $users = User::all();

    // Pass the bookings data to the 'admin' view
    return view('admin', compact('bookings', 'users'));
})->name('admin.dashboard')->middleware('auth', 'admin');

Route::patch('bookings/{booking}', function (Request $request, Booking $booking) {
    $request->validate([
        'status' => 'required|in:For Review,Rejected,For Approval,Approved',
    ]);

    $booking->update(['status' => $request->input('status')]);

    return Redirect::route('admin.dashboard')
        ->with('success', 'Booking status updated successfully');
})->name('booking.update')->middleware('auth', 'admin');

Route::delete('bookings/{booking}', function (Booking $booking) {
    $booking->delete();

    return Redirect::route('admin.dashboard')
        ->with('success', 'Booking deleted successfully');
})->name('booking.destroy')->middleware('auth', 'admin');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
// });

