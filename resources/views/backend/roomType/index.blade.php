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
            <th style="width:10%">Name</th>
            <th style="width:7%">Occupancy</th>
            <th style="width:7%">Bed</th>
            <th style="width:7%">Size</th>
            <th style="width:15%">Description</th>
            <th style="width:15%">Facilities</th>
            <th style="width:7%">Price</th>
            <th style="width:10%">Action</th>
        </thead>
        <tbody>
            @foreach($room_types as $room)
                <tr>
                    <td>{{ $room->name }}</td>
                    <td>{{ $room->occupancy }}</td>
                    <td>{{ $room->bed }}</td>
                    <td>{{ $room->size }}</td>
                    <td>{{ $room->description }}</td>
                    <td>{{ $room->facilities }}</td>
                    <td>{{ $room->price }}</td>
                    <td>
                        <a href="{{ url('/admin/edit_roomType') . '/' . $room->id }}" class="btn btn-warning">Edit</a>
                        <a href="{{ url('/admin/delete_roomType') . '/' . $room->id }}" class="btn btn-danger">Delete</a></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection