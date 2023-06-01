<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomType;

class RoomController extends Controller
{
    public function getData(Request $request){
        $data = Room::where('roomType_id', $request->room_type)->get();
        return $data;
    }

    public function index(){
        $rooms = Room::all();
        return view('backend.room.index', compact('rooms'));
    }

    public function create(){
        $room_types = RoomType::all();
        return view('backend.room.create', compact('room_types'));
    }

    public function store(Request $request){
        $name = $request->name;
        $room_type = $request->room_type;

        Room::create([
            'room_no' => $name,
            'roomType_id' => $room_type,
            'status' => '1'
        ]);

        return redirect('/admin/rooms');
        
    }

    public function edit($id){
        $room = Room::find($id);
        $room_types = RoomType::all();
        
        return view('backend.room.edit', compact('room', 'room_types'));
    }

    public function update(Request $request){
        $id = $request->id;
        $room = Room::find($id);

        $room->room_no = $request->name;
        $room->roomType_id = $request->room_type;
        $room->save();

        return redirect('/admin/rooms');
    }

    public function destroy($id){
        $room = Room::find($id);
        $room->delete();

        return redirect('/admin/rooms')->with('status', 'Room is deleted successfully!');
    }
}

