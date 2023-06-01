@extends('backend.home')

@section('content')
    <section class="container">
        <h3>Room Types</h3>
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12">
                <form class="form" method="POST" action="{{ route('update_roomType') }}" enctype="multipart/form-data"> 
                    @csrf
                    <input type="hidden" class="form-control" name="id" value="{{ $room_type->id }}">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $room_type->name }}">
                    </div>
                    <div class="form-group">
                        <label for="occupancy">Occupancy </label>
                        <input type="number" class="form-control" id="occupancy" name="occupancy" value="{{ $room_type->occupancy }}">
                    </div>
                    <div class="form-group">
                        <label for="bed">Bed</label>
                        <input type="text" class="form-control" id="bed" name="bed" value="{{ $room_type->bed }}">
                    </div>
                    <div class="form-group">
                        <label for="size">Size(m<sup>2</sup>) </label>
                        <input type="number" class="form-control" id="name" name="size" value="{{ $room_type->size }}">
                    </div>
                    <div class="form-group">
                        <label for="price">Price </label>
                        <input type="number" class="form-control" id="price" name="price" value="{{ $room_type->price }}">
                    </div>
                    <div class="form-group">
                        <label for="desc">Description</label>
                        <textarea class="form-control" id="desc" rows="3" name="desc">{{ $room_type->description }}</textarea>
                    </div>
                    <div class="form-group">    
                        <div class="row">
                            @foreach ($facilities as $item)
                               
                                <div class="col-md-3">
                                    <input type="checkbox" name="facilities[]" value="{{ $item->name }}" @if(in_array($item->name, $facts)) checked @endif>
                                    <label>{{ $item->name }}</label>
                                </div>
                                    
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Upload Images</label>
                        <input type="file" class="form-control" name="images[]" multiple>
                        @foreach($room_type->images as $image)
                                <div class="col-lg-6">
                                <div class="col-lg-12 img-del">
                                            <a href="{{ url('/deleteImage') . '/' . $image->id }}" class="text-danger-must">X</a>
                                        </div>
                                    <div class="col-lg-12">
                                        <img src="/images/{{ $image->url }}" width="100%">
                                    </div>
                                </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection