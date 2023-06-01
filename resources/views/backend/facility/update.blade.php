@extends('backend.home')

@section('content')
    <section class="container">
        <h3>Add Facility</h3>
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12">
                <form class="form" method="POST" action="{{ url('/admin/update_facility') }}" enctype="multipart/form-data"> 
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="hidden" name="id" value="{{ $facility->id }}">
                        <input type="text" class="form-control" id="name" name="name" value="{{ $facility->name }}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection