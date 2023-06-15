<?php

use App\Models\RoomType;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomTypeController;

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
    $title = 'Welcome';
    $short_desc = 'to make your travel experience a genuine pleasure';
    $room_types = RoomType::all();
    return view('frontend.home_page', compact('room_types', 'title', 'short_desc'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//backend

Route::prefix('/admin')->group(function(){

    Route::controller(App\Http\Controllers\RoomTypeController::class)->group(function(){
        Route::get('/create_roomType', 'create')->name('create_roomType');
        Route::get('/create_roomType', 'create')->name('create_roomType');
        Route::post('/create_roomType', 'store')->name('store_roomType');
        Route::get('/edit_roomType/{id}', 'edit')->name('edit_roomType');
        Route::post('/update_roomType', 'update')->name('update_roomType');
        Route::get('/delete_roomType/{id}', 'destroy');
        Route::get('/room_types','index')->name('room_types');
    });
    
    Route::controller(App\Http\Controllers\RoomController::class)->group(function(){
        Route::get('/rooms', 'index')->name('rooms');
        Route::get('/create_room', 'create')->name('create_room');
        Route::post('/create_room', 'store')->name('store_room');
        Route::get('/edit_room/{id}', 'edit')->name('edit_room');
        Route::post('/update_room', 'update')->name('update_room');
        Route::get('/delete_room/{id}', 'destroy');

        
    });
    Route::get('/get_room', 'App\Http\Controllers\RoomController@getData')->name('test');

    Route::controller(App\Http\Controllers\FacilityController::class)->group(function(){
        Route::get('/facilities', 'index')->name('facilities');
        Route::get('/create_facility', 'create')->name('create_facility');
        Route::post('/create_facility', 'store')->name('store_facility');
        Route::get('/edit_facility/{id}', 'edit')->name('edit_facility');
        Route::post('/update_facility', 'update')->name('update_facility');
        Route::get('/delete_facility/{id}', 'destroy');

        
    });
    
});

//frontend

Route::get('/rooms', [App\Http\Controllers\RoomTypeController::class, 'index'])->name('frontend.roomType'); //room_types

// Route::post('/booking', [App\Http\Controllers\BookingController::class, 'booking'])->name('booking');

Route::controller(App\Http\Controllers\BookingController::class)->group(function (){
    Route::post('/booking','booking')->name('booking');//home_page
    Route::get('/book/roomType={id}', 'booking_form')->name('book');
    Route::get('/booking_confirmation/roomType={id}', 'booking_confirmation')->name('booking#Confirm');
    Route::post('/booking_confirmed', 'booking_confirmed')->name('booking#Confirmed');
});

Route::get('/user-register', [App\Http\Controllers\CustomerController::class, 'showRegistrationForm']);

Route::post('/user-login', [App\Http\Controllers\CustomerController::class, 'login']);

Route::post('/create_user', [App\Http\Controllers\CustomerController::class, 'register']);

Route::post('/logout', [App\Http\Controllers\CustomerController::class, 'logout'])->name('logout');

Route::get('/about', [App\Http\Controllers\FacilityController::class, 'about']);

Route::get('/contact', [App\Http\Controllers\FacilityController::class, 'contact']);

Route::get('/services', [App\Http\Controllers\FacilityController::class, 'services']);



