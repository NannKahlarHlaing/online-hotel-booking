@extends('frontend.index')

@section('content')

<div class="banner-text scroll-left text-center">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center">Rooms & Suite</h3>
            <p class="scroll-bottom text-center">Discover more than just comfort at {{ env('HOTEl_NAME') }}</p>
        </div>
    </div>
</div>
<section class="rooms">
    <div class="container">
        <div class="row">
            <div class="offset-lg-2 col-lg-8 room-types p-20">
            @foreach ($room_types as $room)
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <img src="http://localhost:3000/images/room1.jpeg" width="100%">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <h4>{{ $room->name }}</h4>
                        <p>Max Occupany: {{ $room->occupancy }} Person(s)</p>
                        <p>Floor Area: {{ $room->size }} sqm</p>
                        <p>Price: {{ $room->price }} MMK</p>
                        <button type="button" class="btn btn-book" data-bs-toggle="modal" data-bs-target="#roomTypeModal{{ $room->id }}">VIEW MORE</button>
                    </div>
                </div>
                <div class="modal fade " id="roomTypeModal{{ $room->id }}" aria-labelledby="roomTypeModalLabel" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl">
                        <div class="modal-content p-30">
                            <div class="modal-header">
                                <h5 class="modal-title text-center" id="roomTypeModalLabel">{{ env('HOTEl_NAME') }} <span>{{ env('CONTACT') }}, </span><span>{{ env('EMAIL') }}</span></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h3 class="mb-30">{{ $room->name }}</h3>
                                <p class="mb-30">{{ $room->description }}</p>
                                <div class="row mb-30">
                                    <div class="col-lg-3">
                                        <span>Max Occupany: {{ $room->occupancy }} Person(s)</span> 
                                    </div>
                                    <div class="col-lg-1">
                                        |
                                    </div>
                                    <div class="col-lg-3">
                                        <span>Floor Area: {{ $room->size }} sqm</span> 
                                    </div>
                                    <div class="col-lg-1">
                                        |
                                    </div>
                                     <div class="col-lg-3">
                                        <span>Price: {{ $room->price }} MMK</span>
                                     </div>
                                     
                                </div>
                                <div class="row">
                                    <h4 class="mb-20">Amenities</h4>
                                    @foreach(explode(',', $room->facilities) as $facility)
                                        <div class="col-lg-5 mb-20">
                                            <li>{{ trim($facility) }}</li>
                                        </div>    
                                    @endforeach
                                </div>
                            </div>
                            <div class="modal-footer">
                                <p>{{ $room->id }}</p>
                                <a href="{{ url('book/roomType=' . $room->id) }}" class="btn btn-book modal-btn">Select Room</a>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>  
            @endforeach
        </div>
        </div>
    </div>
    
</section>

@endsection