<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomType;
use App\Models\Image;

class RoomTypeController extends Controller
{

    public function create(){
        return view('backend.roomType.create');
    }

    public function index(){

        $room_types = RoomType::all();

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

        $room = new RoomType;

        $room->name = $request->name;
        $room->occupancy = $request->occupancy;
        $room->bed = $request->bed;
        $room->size = $request->size;
        $room->description = $request->desc;
        $room->price = $request->price;

        $room->save();

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

        
        
        return redirect('/room_types');
        

    }

    public function edit($id){
        $room_type = RoomType::find($id);
        
        return view('backend.roomType.edit', compact('room_type'));
    }

    public function update(Request $request){
        $id = $request->id;
        $room_type = RoomType::find($id);
        $room_type->name = $request->name;
        $room_type->occupancy = $request->occupancy;
        $room_type->bed = $request->bed;
        $room_type->size = $request->size;
        $room_type->description = $request->desc;
        $room_type->price = $request->price;

        $room_type->save();

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

        return redirect('/room_types');
    }

    public function destroy($id){
        $room_type = RoomType::find($id);

        $room_type->delete();

        $images = Image::where('roomType_id', '=', $id)->get();
        $images->each->delete(); 

        return redirect('/room_types')->with('status', 'RoomType is deleted successfully!');
    }
}
