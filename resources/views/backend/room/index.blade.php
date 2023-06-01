@extends('backend.home')

@section('content')

<div class="row">
    <div class="col-lg-10">
        <h3 class="ft-cl">Rooms</h3>
    </div>
    <div class="col-lg-2">
        <a href="{{ route('create_room') }}" class="btn btn-info">Add Room</a>
    </div>
</div>

@if (Session::has('status'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('status') }}
    </div>
@endif

<table class="table table-striped">
    <thead>
        <th>Name</th>
        <th>Room Category</th>
        <th>Status</th>
        <th>Action</th>
    </thead>
    <tbody>
        @foreach($rooms as $room)
            <tr>
                <td>{{ $room->room_no }}</td>
                <td>{{ $room->roomType_id }}</td>
                @if($room->status == '1')
                    <td>Available</td>
                @else
                    <td>Available</td>
                @endif
                <td>
                    <a href="{{ url('/admin/edit_room') . '/' . $room->id }}" class="btn btn-info">Edit</a>
                    <a href="{{ url('/admin/delete_room') . '/' . $room->id }}" class="btn btn-info">Delete</a></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection