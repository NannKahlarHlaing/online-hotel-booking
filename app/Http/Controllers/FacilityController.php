<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facility;

class FacilityController extends Controller
{

    public function index(){
        $facilities = Facility::get();
        return view('backend.facility.index', compact('facilities'));
    }
    public function create(){
        return view('backend.facility.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required'
        ]);
        
        Facility::create([
            'name' => $request->name
        ]);

        return redirect('/admin/facilities');
    }

    public function edit($id){
        $facility = Facility::find($id);
        return view('backend.facility.update', compact('facility'));
    }

    public function update(Request $request){
        $id = $request->id;
        $facility = Facility::find($id);
        $facility->name = $request->name;
        $facility->save();

        return redirect('/admin/facilities');
    }
    
    public function destroy($id){
        $facility = Facility::find($id);
        $facility->delete();

        return redirect('/admin/facilities')->with('status', 'Facility is deleted successfully!');
    }
}
