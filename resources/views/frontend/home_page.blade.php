@extends('frontend.index')

@section('content')

<div class="banner-text scroll-left text-center">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center">Welcome</h2>
            <p class="scroll-bottom text-center">to make your travel experience a genuine pleasure</p>
        </div>
    </div>
</div>
<section class="home">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
                @if (auth('customer')->check()) 
                    Customer is logged in
                    <form method="POST" action="{{ url('/logout') }}">
                        @csrf
                        <button type="submit">Logout</button>
                      </form>
                @else 
                     Customer is not logged in
                @endif
                <div id="success-alert" class="alert alert-success" style="display: none;">
                    <strong>Success!</strong> Your data has been submitted successfully.
                </div>                
                <form class="form" action={{ route('booking') }} method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-2 form-group">                            
                            <div class="col-md-12">
                                <select class="form-select light-gray" id="room_types" name="room_types">
                                    <option value="" disabled selected hidden>Select RoomType...</option>
                                    @foreach($room_types as $room_type)
                                        <option value="{{ old('room_types', $room_type->id) }}">{{ $room_type->name }}</option>
                                    @endforeach
                                </select>
                                @error('room_types')
                                    <p class="danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </p>
                                @enderror
                            </div>   
                        </div>
                        <div class="col-md-2 form-group">
                            <div class="col-md-12">
                                <select class="form-select light-gray" id="rooms" name="rooms">
                                    <option value="" disabled selected hidden>Select Room...</option>
                                </select>
                                @error('rooms')
                                    <p class="danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2 form-group">
                            <div class="col-md-12">
                                <input type="text" class="form-control datepicker" name="check_in" id="datepicker" placeholder="Check In" onfocus="(this.type='date')" onblur="(this.type='text')" value="{{ old('check_in') }}">
                                @error('check_in')
                                    <p class="danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2 form-group">
                            <div class="col-md-12">
                                <input type="text" class="form-control datepicker" name="check_out" placeholder="Check Out" onfocus="(this.type='date')" onblur="(this.type='text')" value="{{ old('check_out') }}">
                                @error('check_out')
                                    <p class="danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2 form-group">
                            <div class="row">
                                <div class="col-md-6">
                                   
                                    <input type="number" class="form-control" name="adult" value="{{ old('adult') }}" placeholder="Adult" min="1" max="3">
                                   
                                    @error('adult')
                                        <p class="danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </p>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="child"  value="{{ old('child') }}" placeholder="Child" min="1" max="3">
                                    @error('child')
                                        <p class="danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-2 form-group">
                            @if (auth('customer')->check())
                                <button type="submit" class="btn btn-book">Book<i class="fa-solid fa-angles-right ml-10"></i></button>
                            @else
                                <button type="button" class="btn btn-book" data-bs-toggle="modal" data-bs-target="#exampleModal">Book<i class="fa-solid fa-angles-right ml-10"></i></button>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-50 mb-50">
            <div class="col-md-4 short_desc scroll-left">
                <h3>{{ env('HOTEl_NAME') }}</h3>
                <p class="mt-30">Our rooms are designed to transport you into an environment made for leisure. Take your mind off the day-to-day of home life and find a private paradise.</p>
                <a href="#" class="explore">Explore all our rooms <i class="fa-solid fa-angles-right ml-10"></i></a>
            </div>
            <div class="col-md-4 home_rooms scroll-bottom">
                <img src="{{ asset('images/room3.jpg') }}" >
            </div>
            <div class="col-md-4 home_rooms scroll-right">
                <img src="{{ asset('images/room2.jpg') }}" >
            </div>
        </div>
        <div class="row mt-50">
            <div class="col-md-8">
                <div class="">
                    <img src="{{ asset('images/hotel2.jpg') }}" class="w-100">
                    <a href="#" class="explore1">Explore all our rooms <i class="fa-solid fa-angles-right ml-10"></i></a>
                </div>
            </div>
            <div class="col-md-4 mt-45">
                <div class="row d-flex flex-row-reverse">
                    <div class="col-md-11 scroll-right">
                        <img src="{{ asset('images/hotel1.jpg') }}" class="w-100">
                        <a href="#" class="explore1 w-100">Explore all our rooms <i class="fa-solid fa-angles-right ml-10"></i></a>
                    </div>
                </div>    
            </div>
            <div class=" offset-md-7 col-md-5 d-flex justify-content-end  mt--193">
                <div class="scroll-right">
                    <img src="{{ asset('images/hotel3.jpg') }}" class="w-100">
                    <a href="#" class="explore1 w-100">Explore all our rooms <i class="fa-solid fa-angles-right ml-10"></i></a>
                </div>
            </div>
        </div>
    </div>
    
      <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Continue to Booking</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12" id="register">
                            <p>You don't have an account yet? <button class="btn btn-book" id="btn-register">Register</button></p>
                        </div>
                        <div class="col-md-12" id="login">
                            <p>If you have an account. <button class="btn btn-book" id="btn-login">Login</button></p>
                        </div>
                        <div class="col-md-12 bg-light" id="register-form">
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
                        <div class="col-md-12 bg-light" id="login-form">
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
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div> 
    <style>
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        .alert-success {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }
    </style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>

 
<script>
    $(document).ready(function(){
        // alert('hello'); 
        $('#room_types').change(function(){
    var roomType = $('#room_types').val();
    console.log(roomType);
    $.ajax({
        url: '{{route('test')}}',
        type: 'GET',
        data: { 'room_type': roomType },
        success: function(response){
            $("#rooms").empty();
            console.log(response);
            $("#rooms").append('<option value="" disabled selected hidden>Select Room...</option>');
            $.each(response, function(key, value){
                $('#rooms').append($('<option>', {
                    value: value.id,
                    text: value.room_no
                }));
            });
        },
        error: function(xhr, status, error) {
            console.log(xhr.responseText);
        }
    });
});

        
        $(".datepicker").datepicker({
            minDate: 0
        });

        $("#register-form").hide();
        $("#login-form").hide();

        $("#btn-register").on('click', function(event){
            $("#register-form").show('slow');
            $("#login-form").hide();

            $("#register").hide();
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

        $("#btn-login").on('click', function(event){
            $("#login-form").show('slow');
            $("#register-form").hide();

            $("#register").hide();
            $("#login").hide();
        });
    });
    
</script>
</section>

@endsection