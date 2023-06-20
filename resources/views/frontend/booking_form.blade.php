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
    @if ($route == 'from_roomType')
        <div class="container">
            <div class="row">
                <div class="rounded-0 mb-5 p-0 bg-transparent">
                    <form class="form book" action="{{ route('booking#Confirm', $roomType->id) }}" method="GET">
                        <div class="row g-2" style="box-sizing: border-box;">
                            <div class="col-md-3">
                                <div class="form-group bg-body p-3 " >
                                    <div class="col-md-12">
                                        <label for="" class="mb-2">Select RoomType</label>
                                        <select class="form-select light-gray" id="roomTypes" name="room">
                                            @foreach ($roomTypes as $item)
                                                <option value="{{ $item->id }}" {{ $item->id == $id ? 'selected': ''}}>{{ $item->name }}</option>
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
                            <div class="col-md-3">
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
                            <div class="col-md-3">
                                <div class="form-group bg-body p-3 " >
                                    <div class="col-md-12">
                                        <label for="" class="mb-2">Check In - Check Out</label>
                                        <input type="text" class="form-control" name="daterange" value="" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
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
            </div>
            <div class="row mb-5">
                <div class=" px-5">
                    @php
                        $facilities = $roomType->facilities;
                        $facilities_arr = explode(',', $facilities);
                    @endphp
                    @foreach ($facilities_arr as $item)
                    <div class="col-md-3">
                        <li>{{$item}}</li>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3 text-white">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <h5>Select Room</h5>
                                Book with confidence: you are on the hotel website.
                            </div>
                            <div class="col-md-6 text-center">                            
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
                                <div class="col-4 text-center"><i class="fa-solid fa-bed fa-lg me-2"></i>{{ $roomType->bed }}</div>
                                <div class="col-4 text-center"><i class="fa-solid fa-maximize fa-lg me-2"></i>{{ $roomType->size }} sqm</div>
                                <div class="col-4 text-center"><i class="fa-solid fa-sack-dollar fa-lg me-2"></i>{{ $roomType->price }} MMK</div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 p-5">
                    @if (auth('customer')->check())
                        <div class="status">login</div>
                        <a id="submit" type="submit" class="btn w-100 text-uppercase py-4 rounded-0">Book</a>
                    @else
                        <div class="status">not-login</div>
                        Login If you want to make booking
                    @endif
                    <div class="row customer">
                        <div class="col-md-12" id="register-form">
                            <h5 class="modal-title mb-1 text-center">Register</h5>
                            <form class="register-form form" action="{{url('/create_user')}}" method="POST"> 
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
                            </form>
                        </div>
                        <div class="col-md-12" id="login-form">
                            <h5 class="modal-title text-center mb-1">login</h5>  
                            <form  class="form" action="{{ url('/user-login') }}" method="POST">
                                
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
                                    <p id="email-error" class="danger" role="alert"></p>
                                    @error('email')
                                        <p class="danger" role="alert">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="text" class="form-control" id="password" name="password" >
                                    <p id="password-error" class="danger" role="alert"></p>
                                </div>
                                <button type="submit" class="btn-book">Login</button>
                            </form>
                        </div>
                        <div class="col-md-12 my-3" id="register">
                            <p>You don't have an account yet? <button class="btn btn-book mt-2 w-50" id="btn-register">Register</button></p>
                        </div>
                        <div class="col-md-12 my-3" id="login">
                            <p>If you have an account. <button class="btn btn-book mt-2 w-50" id="btn-login">Login</button></p>
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </div>
    @else
    <div class="container">
        <div class="row">
            <div class="rounded-0 mb-5 p-0 bg-transparent">
                <form class="form book" action="" method="GET">
                    <div class="row g-2" style="box-sizing: border-box;">
                        <div class="col-md-3">
                            <div class="form-group bg-body p-3 " >
                                <div class="col-md-12">
                                    <label for="" class="mb-2">Select RoomType</label>
                                    <select class="form-select light-gray" id="roomTypes" name="room">
                                        @foreach ($roomTypes as $item)
                                            <option value="{{ $item->id }}" {{ $item->id == '' ? 'selected': ''}}>{{ $item->name }}</option>
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
                        <div class="col-md-3">
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
                        <div class="col-md-3">
                            <div class="form-group bg-body p-3 " >
                                <div class="col-md-12">
                                    <label for="" class="mb-2">Check In - Check Out</label>
                                    <input type="text" class="form-control" name="daterange" value="" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
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
                                                <div id="occupancy" class="d-none">
                                                    {{-- {{ $roomType->occupancy }} --}}
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="popup" id="popup">
                                                    <h4>Pop-     Content</h4>
                                                    <p>Adult : 
                                                    <button type="button" id="minusAdult" class="btn mx-3"><i class="fa-solid fa-minus p-1" ></i></button> 
                                                        <span id="adult" class="guest">
                                                            {{-- {{ $roomType->occupancy }} --}}
                                                        </span>
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
        </div>
    </div>
    @endif
    
    
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

            $('.status').hide();
            var status = $('.status').text();
            if(status == 'login'){
                $('.customer').hide();
            }

            $('#submit').on('click', function(){
                $('.book').submit();
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

            $("#register-form").hide();
            $("#login").hide();


            $("#btn-register").on('click', function(event){
                $("#register-form").show('slow');
                $("#login-form").hide();

                $("#register").hide();

            });

            $("#btn-login").on('click', function(event){
                $("#login-form").show('slow');
                $("#register-form").hide();

                // $("#register").hide();
                $("#login").hide();
            });

            $('.register-form').submit(function(event) {
                event.preventDefault(); // Prevent the form from submitting and closing the modal
                var formData = $('.register-form').serialize();
                // Perform AJAX request to submit form data
                $.ajax({
                    url: '{{('/create_user')}}',
                    type: 'POST',
                    data: formData,
                    success:function(response)
                    {
                        if (response.status == 'success') {
                            console.log('aaaaaa');
                            $('#success-alert').show();
                        }
                        setTimeout(function(){
                            location.reload();
                        }, 1000);
                
                        
                    },
                    error: function(response) {
                        console.log(response)
                    }
                });
                $('#exampleModal').on('hidden.bs.modal', function (e) {
                    $('#register-form').html('');
                });
            });

            $('#roomTypes').change(function(){
            var roomType = $('#roomTypes').val();
            $.ajax({
                url: '{{route('test')}}',
                type: 'GET',
                data: { 'room_type': roomType },
                success: function(response){
                    $("#rooms").empty();
                    $("#rooms").append('<option value="" disabled selected hidden>Select Room...</option>');
                    $.each(response[0], function(key, value){
                        $('#rooms').append($('<option>', {
                            value: value.id,
                            text: value.room_no
                        }));
                    });
                    console.log(response[1]);
                    $('#occupancy').text(response[1].occupancy);
                    $('#adult').text(response[1].occupancy);
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });

        });
    </script>   
@endsection