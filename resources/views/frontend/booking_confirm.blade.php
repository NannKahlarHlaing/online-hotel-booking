@extends('frontend.index')

@section('content')

<div class="container ">
    <div class="info">
        <h1>Finalize your stay</h1>
        <p>Book with confidence: <span>you are on the hotel website.</span> </p>
    </div>
</div>
<section>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                @if (Session::has('booking_fail'))
                    <div class="alert alert-warning">{{ Session::get('booking_fail') }} </div>
                @endif 
                {{-- @if (Session::has('booking_success'))
                    <div class="alert alert-success">{{ Session::get('booking_success') }}</div>
                @endif --}}
                @if (Session::has('booking_success'))
                    <div class="alert alert-success">{{ Session::get('booking_success') }}</div>
                    <script>
                        setTimeout(function() {
                            window.location.href = "{{ route('frontend.index') }}";
                        }, 3000);
                    </script>
                @endif
                <div class="card rounded-0" style="">
                    <div class="card-header ht-info rounded-0">
                        <h5 class="card-title">Your reservation - from {{$info['daterange']}}</h5>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title mb-3">{{ env('HOTEl_NAME') }}</h4>
                        <div class="row my-2">
                            <div class="col-lg-3 col-md-6 col-6">
                                <span>Address</span>
                            </div>
                            <div class="col-9">
                                {{ env('ADDRESS') }}
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-lg-3 col-md-6 col-6">
                                <span>Reception is open</span>
                            </div>
                            <div class="col-9">
                                24hours
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-lg-3 col-md-6 col-6">
                                <span>Check-in from</span>
                            </div>
                            <div class="col-9">
                                3:00 PM
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-lg-3 col-md-6 col-6">
                                <span>Check-out before</span>
                            </div>
                            <div class="col-9">
                                11:00 AM
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-lg-3 col-md-6 col-6">
                                <span>Contact</span>
                            </div>
                            <div class="col-9">
                                {{ env('CONTACT') }}
                            </div>
                        </div>
                    </div>
                    <div class="card-body border-top">
                        <div class="row my-2">
                            <div class="col-6">
                                {{ $roomType->name }}
                            </div>
                            <div class="col-6">
                                {{ $roomType->price }} MMK
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-6">
                                Not included: Service Charge
                            </div>
                            <div class="col-6">
                                {{  $service_charge }} MMK
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-6">
                                Not included: VAT / Consumption tax
                            </div>
                            <div class="col-6">
                                {{  $tax }} MMK
                            </div>
                        </div>
                    </div>
                    <div class="card-body border-top">
                        <div class="row my-2">
                            <div class="col-6">
                                Total
                            </div>
                            <div class="col-6">
                                {{  $total  }} MMK 
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ht-info text-center rounded-0   ">
                        <form action="{{ route('booking#Confirmed') }}" method="post">
                            @csrf
                            <input type="hidden" name="roomType" id="info" value="{{$roomType->id}}">
                            <input type="hidden" name="daterange" id="info" value="{{$info['daterange']}}">
                            <input type="hidden" name="room" id="info" value="{{$info['room']}}">
                            <input type="hidden" name="adult" id="info" value="{{$info['adult']}}">
                            <input type="hidden" name="child" id="info" value="{{$info['child']}}">
                            <input type="hidden" name="total" id="info" value="{{$total}}">
                            <button type="submit" class="btn ht-info border-0 w-100">Book</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection