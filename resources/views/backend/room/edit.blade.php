@extends('backend.home')

@section('content')
    <section class="container">
        <h3>Room Types</h3>
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12">
                <form class="form" method="POST" action="{{ route('update_room') }}" enctype="multipart/form-data"> 
                    @csrf
                    <input type="hidden" name="id" value="{{ $room->id }}">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $room->room_no }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Room Category</label>
                        <select class="form-control" name="room_type">
                            <option value="">Select Room Type</option>
                            @foreach($room_types as $room_type)
                                <option value="{{ $room_type->id }}" {{ $room_type->id == $room->roomType_id ? "selected":"" }}>{{ $room_type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection