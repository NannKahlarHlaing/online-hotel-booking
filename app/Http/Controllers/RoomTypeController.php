<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomType;
use App\Models\Image;
use App\Models\Facility;

class RoomTypeController extends Controller
{

    public function create(){
        $facilities = Facility::all();
        return view('backend.roomType.create', compact('facilities'));
    }

    public function index(Request $request){

        $route = $request->route()->getName();

        $room_types = RoomType::all();
        $facilities = [];
        if($route == 'frontend.roomType'){
           
            return view('frontend.rooms', compact('room_types'));
        }

        return view('backend.roomType.index', compact('room_types'));
    }

    public function store(Request $request){

        // $this->validate($request, [
        //     'name' => 'required|string|max:255',
        //     'numOfPerson' => 'required',
        //     'bed' => 'required',
        //     'size' => 'required',
        //     'desc' => 'required|string|max:855',
        // ]);

        $roomType = new RoomType;

        $roomType->name = $request->name;
        $roomType->occupancy = $request->occupancy;
        $roomType->bed = $request->bed;
        $roomType->size = $request->size;
        $roomType->description = $request->desc;
        $roomType->price = $request->price;
        $facilities = implode(',', $request->input('facilities'));
        $roomType->facilities = $facilities;

        $roomType->save();

        $images = $request->file('images');

        if($images != '' || $images != NULL){
            foreach ($images as $image) {
                $imageModels = new Image;
                $imageName = uniqid() . time().'.'.$image->extension();  
                $image->move(public_path('images'),$imageName);
                $imageModels->url = $imageName;
                $imageModels->roomType_id = $room->id;
                $imageModels->save();
            }
    
        }
        
        return redirect('/admin/room_types');
    }

    public function edit($id){
        $room_type = RoomType::find($id);
        $facilities = Facility::all();

        $facts = explode(',', $room_type->facilities);
        return view('backend.roomType.edit', compact('room_type', 'facilities', 'facts'));
    }

    public function update(Request $request){
        $id = $request->id;
        $room_type = RoomType::find($id);
        // dd($room_type->facilities);
        $room_type->name = $request->name;
        $room_type->occupancy = $request->occupancy;
        $room_type->bed = $request->bed;
        $room_type->size = $request->size;
        $room_type->description = $request->desc;
        $room_type->price = $request->price;
        $facilities_str = implode(',', $request->input('facilities'));
        $room_type->facilities = $facilities_str;

        $room_type->save();

        $images = $request->file('images');

        if($images != '' || $images != NULL){
            foreach ($images as $image) {
                $imageModels = new Image;
                $imageName = uniqid() . time().'.'.$image->extension();  
                $image->move(public_path('images'),$imageName);
                $imageModels->url = $imageName;
                $imageModels->roomType_id = $room_type->id;
                $imageModels->save();
            }
        }
        return redirect('/admin/room_types');
    }

    public function destroy($id){
        $room_type = RoomType::find($id);

        $room_type->delete();

        $images = Image::where('roomType_id', '=', $id)->get();
        $images->each->delete(); 

        return redirect('/admin/room_types')->with('status', 'RoomType is deleted successfully!');
    }

    
}
