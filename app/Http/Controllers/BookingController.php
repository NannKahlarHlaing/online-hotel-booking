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

    public function booking_form($id){
        $roomType = RoomType::find($id);
        $rooms = Room::where('roomType_id', $id)->get();
        
        return view('frontend.booking_form', compact('roomType', 'rooms'));
    }

    public function booking_confirmation(Request $request, $id){
        $roomType = RoomType::find($id);
        $service_charge = 0.1 * intval($roomType->price);
        $tax = 0.08 * intval($roomType->price);
        $total = intval($roomType->price) + $service_charge + $tax;
        $info = $request->all();
        
        return view('frontend.booking_confirm', compact('roomType', 'info', 'service_charge', 'tax', 'total'));
    }

    public function booking_confirmed(Request $request){

        $daterange= $request->daterange;
        $room = $request->room;
        $adult = $request->adult;
        $child = $request->child;
        $total = $request->total;
        // dd($room);
        $parts = explode(" - ", $daterange);

        $checkIn = $parts[0];
        $checkOut = $parts[1];
        
        $booking = Booking::where('room_id', $room)
        ->whereBetween('check_in', [$checkIn, $checkOut])->get();

        if(count($booking) > 0){
            // foreach($booking as $bkk){
            //     if ($bkk->room_id == $room) {
                    return back()->with('booking_fail', 'This room is already booked. Select another room');
                // }
            // }
        }else{

            $roomType = RoomType::find($request->roomType);
            $service_charge = 0.1 * intval($roomType->price);
            $tax = 0.08 * intval($roomType->price);
            $total = intval($roomType->price) + $service_charge + $tax;

            Booking::create([
                'customer_id' => 1,
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
            $roomType->name . '-> ' . $room . ' - ' . $roomType->price . ' MMK<br>' .
            'Not included: Service Charge - ' . $service_charge . '<br>' .
            'Not included: VAT / Consumption tax - ' . $tax . ' MMK<br><hr>' .
            'Total - ' . $total . 'MMK<br>'; // Replace with your desired HTML content

            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait');

            $dompdf->render();

            $dompdf->stream('document.pdf', ['Attachment' => true]);
            
        }
        
    }
}
