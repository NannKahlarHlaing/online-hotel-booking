<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RoomTypeController;
use App\Models\RoomType;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    $room_types = RoomType::all();
    return view('frontend.home_page', compact('room_types'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//backend

Route::get('/create_roomType', [App\Http\Controllers\RoomTypeController::class, 'create'])->name('create_roomType');

Route::post('/create_roomType', [App\Http\Controllers\RoomTypeController::class, 'store'])->name('store_roomType');

Route::get('/edit_roomType/{id}', [App\Http\Controllers\RoomTypeController::class, 'edit'])->name('edit_roomType');

Route::post('/update_roomType', [App\Http\Controllers\RoomTypeController::class, 'update'])->name('update_roomType');

Route::get('/delete_roomType/{id}', [App\Http\Controllers\RoomTypeController::class, 'destroy']);

Route::get('/room_types',[App\Http\Controllers\RoomTypeController::class, 'index'])->name('room_types');

Route::get('/rooms',[App\Http\Controllers\RoomController::class, 'index'])->name('rooms');

Route::get('/create_room',[App\Http\Controllers\RoomController::class, 'create'])->name('create_room')->name('create');

Route::post('/create_room',[App\Http\Controllers\RoomController::class, 'store'])->name('store_room');

Route::get('/edit_room/{id}', [App\Http\Controllers\RoomController::class, 'edit'])->name('edit_room');

Route::post('/update_room', [App\Http\Controllers\RoomController::class, 'update'])->name('update_room');

Route::get('/delete_room/{id}', [App\Http\Controllers\RoomController::class, 'destroy']);

//frontend

Route::get('/get_roomType', [App\Http\Controllers\RoomController::class, 'getData']);

Route::post('/booking', [App\Http\Controllers\BookingController::class, 'booking'])->name('booking');

Route::get('/user-register', [App\Http\Controllers\CustomerController::class, 'showRegistrationForm']);

Route::post('/user-login', [App\Http\Controllers\CustomerController::class, 'login']);


Route::post('/create_user', [App\Http\Controllers\CustomerController::class, 'register']);


Route::post('/logout', [App\Http\Controllers\CustomerController::class, 'logout'])->name('logout');

