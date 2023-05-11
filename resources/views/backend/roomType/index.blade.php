@extends('backend.home')

@section('content')

<div class="row">
    <div class="col-lg-10">
        <h3 class="ft-cl">Room Types</h3>
    </div>
    <div class="col-lg-2">
        <a href="{{ route('create_roomType') }}" class="btn btn-info">Add Room Type</a>
    </div>
</div>

@if (Session::has('status'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('status') }}
    </div>
@endif

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <th>Name</th>
            <th>Occupancy</th>
            <th>Bed</th>
            <th>Size</th>
            <th class="w-25">Description</th>
            <th>Price</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach($room_types as $room)
                <tr>
                    <td>{{ $room->name }}</td>
                    <td>{{ $room->occupancy }}</td>
                    <td>{{ $room->bed }}</td>
                    <td>{{ $room->size }}</td>
                    <td>{{ $room->description }}</td>
                    <td>{{ $room->price }}</td>
                    <td>
                        <a href="{{ url('/edit_roomType') . '/' . $room->id }}" class="btn btn-info">Edit</a>
                        <a href="{{ url('/delete_roomType') . '/' . $room->id }}" class="btn btn-info">Delete</a></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection