<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    
    public function booking(Request $request){
        
        $cus_id = $customerId = Auth::guard('customer')->user()->id;

        $this->validate($request, [
            'room_types' => 'required',
            'rooms' => 'required',
            'check_in' => 'required',
            'check_out' => 'required',
            'adult' => 'required',
            'child' => 'required'
        ]);

        Booking::create([
            'customer_id' => $cus_id,
            'room_id' => $request->rooms,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'adult' => $request->adult,
            'children' => $request->child,
            'remark' => 'aa'
        ]);
        
        return back()->with('success', 'You have successfully booked');
    }
}
