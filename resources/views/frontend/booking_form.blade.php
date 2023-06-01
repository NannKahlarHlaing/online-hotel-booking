@extends('frontend.index')

@section('content')

<div class="container ">
    <div class="info">
        <h1>{{ env('HOTEl_NAME') }}</h1>
        <p>{{ env('CONTACT') }}</p>
        <p>{{ env('ADDRESS') }}</p>
        </div>
</div>
<section class="mt--50">
    <div class="container">
        <div class="row">
            <div class="rounded-0 mb-5 p-0 bg-transparent">
                <form class="form" action="{{ route('booking#Confirm', $roomType->id) }}" method="GET">
                    <div class="row g-2" style="box-sizing: border-box;">
                        <div class="col-md-4">
                            <div class="form-group bg-body p-3 " >
                                <div class="col-md-12">
                                    <label for="" class="mb-2">Select Room</label>
                                    <select class="form-select light-gray" id="rooms" name="room">
                                        @foreach ($rooms as $item)
                                            <option value="{{ $item->id }}">{{ $item->room_no }}</option>
                                        @endforeach
                                    </select>
                                    @error('rooms')
                                        <p class="danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group bg-body p-3 " >
                                <div class="col-md-12">
                                    <label for="" class="mb-2">Check In - Check Out</label>
                                    <input type="text" class="form-control" name="daterange" value="" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group bg-body p-3 " >
                                <div class="row">
                                    <label for="" class="mb-2">Guests</label>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-lg-12 guest">
                                                <button type="button" class="btn" id="popupButton">
                                                    Adult : <input type="text" class="border-0" id="adultCount" name="adult" value="2" size="1" readonly />
                                                    , Child : <input type="text"  class="border-0" name="child" id="childCount" value="0" size="1" readonly />
                                                </button>
                                                <div id="occupancy" class="d-none">{{ $roomType->occupancy }}</div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="popup" id="popup">
                                                    <h4>Pop-     Content</h4>
                                                    <p>Adult : 
                                                       <button type="button" id="minusAdult" class="btn mx-3"><i class="fa-solid fa-minus p-1" ></i></button> 
                                                        <span id="adult" class="guest">{{ $roomType->occupancy }}</span>
                                                        <button type="button" id="plusAdult" class=" btn mx-3"><i class="fa-solid fa-plus p-1" ></i></button>
                                                    </p>
                                                    <p>Child : &nbsp;
                                                        <button type="button" id="minusChild" class="btn mx-3"><i class="fa-solid fa-minus p-1" ></i></button>
                                                        <span id="child" class="guest">0</span>
                                                        <button type="button" id="plusChild" class="btn mx-3"><i class="fa-solid fa-plus p-1" ></i></button>
                                                    </p>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <button type="button" class="btn" id="closeButton">
                                                                Cancel
                                                              </button>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <button type="button" class="btn btn-book" id="applyButton">
                                                                Apply
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </form>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="mb-3 text-white">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h5>Select Room</h5>
                            Book with confidence: you are on the hotel website.
                        </div>
                        <div class="col-md-6 text-center">
                            <a id="submit" type="submit" class="btn w-100 text-uppercase py-4 rounded-0">Book</a>
                        </div>
                    </div>
                </div>
                <div class="card rounded-0" style="">
                    <div class="card-body">
                        <h5 class="card-title">{{ $roomType->name }}</h5>
                        <p class="card-text">{{$roomType->description}}</p>
                      </div>
                    @foreach ($roomType->images as $item)
                        <img src="/images/{{$item->url}}" class="card-img-top rounded-0" alt="...">
                    @endforeach                    
                    <div class="card-body">
                        <div class="row justify-content-between py-2">
                            <div class="col-3 text-center"><i class="fa-solid fa-bed fa-lg me-2"></i>{{ $roomType->bed }}</div>
                            <div class="col-3 text-center"><i class="fa-solid fa-maximize fa-lg me-2"></i>{{ $roomType->size }} sqm</div>
                            <div class="col-3 text-center"><i class="fa-solid fa-sack-dollar fa-lg me-2"></i>{{ $roomType->price }} MMK</div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 px-5">
                <div class="cus-info">
                    {{-- <form class="register-form form" action="{{url('/create_user')}}" method="POST"> 
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="cus_name" value="{{old('cus_name')}}">
                                <p id="cus_name-error" class="danger" role="alert"></p>
                        </div>
                        <div class="mb-3">
                            <label for="NRC" class="form-label">NRC</label>
                            <input type="text" class="form-control" id="NRC" name="NRC" value="{{old('NRC')}}">
                                <p id="NRC-error" class="danger" role="alert"></p>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="number" class="form-control" id="phone" name="phone" value="{{old('phone')}}">
                            <p id="phone-error" class="danger" role="alert"></p>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
                            <p id="email-error" class="danger" role="alert"></p>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" class="form-control" id="password" name="password" >
                            <p id="password-error" class="danger" role="alert"></p>
                        </div>
                        
                        <div class="mb-3">
                            <label for="password" class="form-label">Confirm Password</label>
                            <input type="text" class="form-control" id="password_confirmation" name="password_confirmation">
                            <p id="password_confirmation-error" class="danger" role="alert"></p>
                        </div>
                        <button type="submit" class="btn-book">Submit</button>
                    </form> --}}
                </div>
                @php
                    $facilities = $roomType->facilities;
                    $facilities_arr = explode(',', $facilities);
                @endphp
                @foreach ($facilities_arr as $item)
                    <li>{{$item}}</li>
                @endforeach
            </div>
        </div>
    </div>
</section>
  
  <script>
        // Get references to the button and the pop-up
        const popupButton = document.getElementById('popupButton');
        const popup = document.getElementById('popup');
        
        
        // Function to close the pop-up
        function closePopup() {
        popup.style.display = 'none';
        }
        
        // Attach event listeners to the button and close button
        
        closeButton.addEventListener('click', closePopup);
        applyButton.addEventListener('click', closePopup);

        $(function() {
        $('input[name="daterange"]').daterangepicker({
            opens: 'right',
            minYear: 2023,
        }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
        });

        $( document ).ready(function() {

            $('#submit').on('click', function(){
                $('.form').submit();
            });

            $('#popupButton').on('click', function(){
                $('#popup').show();
            });

            // jQuery event listener for the minus icon
            $('#minusAdult').on('click', function() {
            // Get the current value of the adult count
            var adultCount = parseInt($('#adult').text());

            // Decrease the value by 1
            if (adultCount > 0) {
                adultCount--;
                
            }
            $('#plusAdult').removeClass('disabled');
                $('#plusChild').removeClass('disabled');
            // Update the value in the HTML
            $('#adult').text(adultCount);

            });

            $('#plusAdult').on('click', function() {
            
                var adultCount = parseInt($('#adult').text());
                var childCount = parseInt($('#child').text());
                var totalCount = adultCount + childCount ;
                var occupancy = parseInt($('#occupancy').text());

                if (totalCount >= occupancy) {
                    $('#plusAdult').addClass('disabled');
                }else{
                    // Increase the value by 1
                    adultCount++;
                    $('#plusAdult').removeClass('disabled');
                    
                }
                
                // Update the value in the HTML
                $('#adult').text(adultCount);
            
            });

            // jQuery event listener for the minus icon
            $('#minusChild').on('click', function() {
            // Get the current value of the adult count
                var childCount = parseInt($('#child').text());

                // Decrease the value by 1
                if (childCount > 0) {
                    childCount--;
                    
                }
                $('#plusChild').removeClass('disabled');
                $('#plusAdult').removeClass('disabled');
        
                // Update the value in the HTML
                $('#child').text(childCount);

            });

            $('#plusChild').on('click', function() {
                

                var adultCount = parseInt($('#adult').text());
                var childCount = parseInt($('#child').text());
                var totalCount = adultCount + childCount ;
                var occupancy = parseInt($('#occupancy').text());

                if (totalCount >= occupancy) {
                    $('#plusChild').addClass('disabled');
                }else{
                    // Increase the value by 1
                    childCount++;
                    $('#plusChild').removeClass('disabled');
                }
            
            // Update the value in the HTML
            $('#child').text(childCount);

            });
            

            $('#applyButton').on('click', function(){
                acount = $('#adult').text();
                ccount = $('#child').text();
                $('#adultCount').val(acount);
                $('#childCount').val(ccount);
            });

        });
    </script>   
@endsection