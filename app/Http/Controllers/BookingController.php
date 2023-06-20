<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\Room;
use App\Models\Booking;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BookingController extends Controller
{
    
    // public function booking(Request $request){
    //     $cus_id = Auth::guard('customer')->user()->id;

    //     $customer = Auth::guard('customer')->user();

    //     $this->validate($request, [
    //         'room_types' => 'required',
    //         'rooms' => 'required',
    //         'check_in' => 'required',
    //         'check_out' => 'required',
    //         'adult' => 'required',
    //         'child' => 'required'
    //     ]);

    //     $checkIn = $request->check_in;
    //     $checkOut = $request->check_out;
    //     $room = $request->rooms;

    //     $roomType = RoomType::find($request->room_types);
    //         $service_charge = 0.1 * intval($roomType->price);
    //         $tax = 0.08 * intval($roomType->price);
    //         $total = intval($roomType->price) + $service_charge + $tax;

    //     $booking_room = Booking::where('room_id', $room)->get();

    //     $booking = Booking::where('room_id', $room)
    //         ->whereBetween('check_in', [$checkIn, $checkOut])
    //         ->orWhere('check_out', $checkIn)
    //         ->whereBetween('check_out', [$checkIn, $checkOut])->get();
        
    //         if(count($booking) > 0){
    //             return back()->with('booking_fail', 'This room is already booked. Select another room');  
    //         }else{

    //     Booking::create([
    //         'customer_id' => $cus_id,
    //         'room_id' => $room,
    //         'check_in' => $checkIn,
    //         'check_out' => $checkOut,
    //         'adult' => $request->adult,
    //         'children' => $request->child,
    //         'remark' => 'aa'
    //     ]);

    //     $dompdf = new Dompdf();
    //         $html = '<h4>Your reservation - from ' .  $checkIn . ' - ' . $checkOut . ' at ' . env('HOTEl_NAME') . '</h4><br>' .
    //         'Address - ' . env('ADDRESS') . '<br>' .
    //         'Reception is open - 24hours<br>' .
    //         'Check-in from - 3:00 PM<br>' .
    //         'Check-out before - 11:00 AM<br>' .
    //         'Contact - ' . env('CONTACT') . '<br>' .
    //         'Check-out before - 11:00 AM<br><hr>' .
    //         'Contact information<br> ' .
    //         'Name - ' . $customer->name . '<br>' .
    //         'NRC - ' . $customer->NRC . '<br>' . 
    //         'Phone - ' . $customer->ph_no . '<br>' .
    //         'Email - ' . $customer->email . '<br><hr>' .
    //         $roomType->name . '-> ' . $room . ' - ' . $roomType->price . ' MMK<br>' .
    //         'Not included: Service Charge - ' . $service_charge . '<br>' .
    //         'Not included: VAT / Consumption tax - ' . $tax . ' MMK<br><hr>' .
    //         'Total - ' . $total . 'MMK<br><hr>'; // Replace with your desired HTML content

    //         $dompdf->loadHtml($html);
    //         $dompdf->setPaper('A4', 'portrait');

    //         $dompdf->render();

    //         $dompdf->stream('document.pdf', ['Attachment' => true]);
    //         return back()->with('success', 'You have successfully booked');
    //     }
        
        
    // }

    public function booking(){
        $roomTypes = RoomType::all();
        $rooms = Room::all();

        $route = 'from_booking';

        return view('frontend.booking_form', compact('roomTypes', 'rooms', 'route'));
    }

    public function booking_form($id){

        $roomTypes = RoomType::all();
        $roomType = RoomType::find($id);
        $rooms = Room::all();

        $route = 'from_roomType';
        
        return view('frontend.booking_form', compact('roomType', 'rooms', 'roomTypes', 'id', 'route'));
    }

    public function booking_confirmation(Request $request, $id){
        $roomType = RoomType::find($id);
        $service_charge = 0.1 * intval($roomType->price);
        $tax = 0.08 * intval($roomType->price);
        $total = intval($roomType->price) + $service_charge + $tax;
        $info = $request->all();

        $customer = Auth::guard('customer')->user();

        
        return view('frontend.booking_confirm', compact('roomType', 'info', 'service_charge', 'tax', 'total', 'customer'));
    }

    public function booking_confirmed(Request $request){

        $cus_id = Auth::guard('customer')->user()->id;

        $customer = Auth::guard('customer')->user();

        $daterange= $request->daterange;
        $room = $request->room;
        $adult = $request->adult;
        $child = $request->child;
        $total = $request->total;
        $parts = explode(" - ", $daterange);

        $checkIn = $parts[0];
        $checkOut = $parts[1];
        
        $booking = Booking::where('room_id', $room)
        ->whereBetween('check_in', [$checkIn, $checkOut])->get();

        if(count($booking) > 0){
            return back()->with('booking_fail', 'This room is already booked. Select another room');  
        }else{

            $roomType = RoomType::find($request->roomType);
            $service_charge = 0.1 * intval($roomType->price);
            $tax = 0.08 * intval($roomType->price);
            $total = intval($roomType->price) + $service_charge + $tax;

            Booking::create([
                'customer_id' => $cus_id,
                'room_id' => $room,
                'check_in' => $checkIn,
                'check_out' => $checkOut,
                'adult' => $adult,
                'children' => $child,
                'remark' => 'aa'
            ]);
            

            $dompdf = new Dompdf();
            $html = '<h4>Your reservation - from ' .  $checkIn . ' - ' . $checkOut . ' at ' . env('HOTEl_NAME') . '</h4><br>' .
            'Address - ' . env('ADDRESS') . '<br>' .
            'Reception is open - 24hours<br>' .
            'Check-in from - 3:00 PM<br>' .
            'Check-out before - 11:00 AM<br>' .
            'Contact - ' . env('CONTACT') . '<br>' .
            'Check-out before - 11:00 AM<br><hr>' .
            'Contact information<br> ' .
            'Name - ' . $customer->name . '<br>' .
            'NRC - ' . $customer->NRC . '<br>' . 
            'Phone - ' . $customer->ph_no . '<br>' .
            'Email - ' . $customer->email . '<br><hr>' .
            $roomType->name . '-> ' . $room . ' - ' . $roomType->price . ' MMK<br>' .
            'Not included: Service Charge - ' . $service_charge . '<br>' .
            'Not included: VAT / Consumption tax - ' . $tax . ' MMK<br><hr>' .
            'Total - ' . $total . 'MMK<br><hr>'; // Replace with your desired HTML content

            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait');

            $dompdf->render();

            $dompdf->stream('document.pdf', ['Attachment' => true]);
            
        }
        
    }
}
