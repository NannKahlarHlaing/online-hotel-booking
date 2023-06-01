@extends('backend.home')

@section('content')

<div class="row">
    <div class="col-lg-5">
        <h3 class="ft-cl">Facilities</h3>
    </div>
    <div class="col-lg-2">
        <a href="{{ route('create_facility') }}" class="btn btn-info">Add Facility</a>
    </div>
</div>

<div class="row">
    <div class="col-lg-7">
        @if (Session::has('status'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('status') }}
            </div>
        @endif
        <table class="table table-striped">
            <thead>
                <th scope="col" class="col-6">Name</th>
                <th scope="col" class="col-6">Action</th>
            </thead>
            <tbody>
                @foreach($facilities as $facility)
                    <tr>
                        <td>{{ $facility->name }}</td>
                        <td>
                            <a href="{{ url('/admin/edit_facility') . '/' . $facility->id }}" class="btn btn-info">Edit</a>
                            <a href="{{ url('/admin/delete_facility') . '/' . $facility->id }}" class="btn btn-info">Delete</a></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection