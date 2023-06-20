<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HaYoon Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    {{-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Berkshire+Swash&family=Castoro+Titling&family=Lobster&display=swap" rel="stylesheet"> --}}
    <script src="https://unpkg.com/scrollreveal"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css" integrity="sha512-SgaqKKxJDQ/tAUAAXzvxZz33rmn7leYDYfBP+YoMRSENhf3zJyx3SBASt/OfeQwBHA1nxMis7mM3EV/oYT6Fdw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,700;0,800;1,400&display=swap" rel="stylesheet">

    
</head>
<body>

<section class="header bg-image">
    <div class="navbar-expand-lg">
        <div class="container">
            <div class="row p-1 d-flex justify-content-end ">
                    @if (auth('customer')->check()) 
                        <div class="col-3 col-md-2 col-lg-2">
                            <form method="POST" action="{{ url('/logout') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <span class="text-color">{{ auth('customer')->user()->name }}</span>
                                    </div>
                                    <div class="col-6">
                                        <button type="submit" class="bg-transparent border-0 text-color">Logout</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @else
                    <div class="col-3 col-md-2 col-lg-1"><button type="button" class="bg-transparent border-0 text-color" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button></div>
                    <div class="col-3 col-md-2 col-lg-1"><button type="button" class="bg-transparent border-0 text-color" data-bs-toggle="modal" data-bs-target="#registerModal">Register</button></div>
                @endif
            </div>
        </div>
    </div>
    <div class="row"></div>
    <div class="container">
        
        <div class="row">
            <div class="col-12">
                <h1 class="mt-30 mb-30">{{ env('HOTEl_NAME') }}</h1>
            </div>
            <div class=" col-md-12">
                <div class="">
                <nav class="navbar navbar-expand-lg">
                    <div class="container">
                        <a class="navbar-brand col-2" href="{{ url('/') }}">Home</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                            </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0 col">
                                <li class="nav-item col">
                                    <a class="nav-link" aria-current="page" href="{{ url('/rooms') }}">Rooms</a>
                                </li>
                                <li class="nav-item col">
                                    <a class="nav-link" href="{{ url('/services') }}">Services</a>
                                </li>
                                <li class="nav-item col">
                                    <a class="nav-link " href="{{ url('/contact') }}">Contact</a>
                                </li>
                                <li class="nav-item col">
                                    <a class="nav-link " href="{{ url('/about') }}">About</a>
                                </li>
                                <li class="nav-item col" >
                                    <a class="nav-link " href="{{ url('/booking') }}">Book</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 bg-light" >
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
                </div>
                
            </div>
        </div>
    </div>
</div> 
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 bg-light" id="">
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

@yield('content')

<section class="footer mt-5 ">
    <div class="container border-top">
        <a onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa-solid fa-arrow-up"></i></a>
        <div class="row d-flex justify-content-between p-5">
            <div class="col">
                <div class="row">
                    <div class="col-12">
                        <i class="fa-solid fa-phone fa-xl me-2"></i>{{ env('CONTACT') }}
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-12">
                        <i class="fa-solid fa-envelope fa-xl me-2"></i></i>{{ env('EMAIL') }}
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-12">
                        <i class="fa-solid fa-location-dot fa-xl me-2"></i>{{ env('ADDRESS') }}
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <h5>About the Hotel</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc in turpis eros. Proin vel nulla mi. Aenean id tempor ipsum.</p>
                    <p><i class="fa-brands fa-square-facebook fa-2xl me-5"></i><i class="fa-brands fa-instagram fa-2xl me-5"></i><i class="fa-brands fa-square-youtube fa-2xl me-5"></i></p>
                </div>
            </div>
            
        </div>
    </div>
</section>

<script>
    ScrollReveal().reveal('.scroll-left',{
        origin: 'left',
        distance: '200px',
        duration: 2400,
        // reset: true,
        interval: 100,
        scale: 0.9,
        viewFactor: 0.9,
    });
    ScrollReveal().reveal('.scroll-bottom',{
        origin: 'bottom',
        distance: '200px',
        duration: 2400,
        // reset: true,
        interval: 100,
        scale: 0.9,
        viewFactor: 0.9,
    });
    ScrollReveal().reveal('.scroll-right',{
        origin: 'right',
        distance: '200px',
        duration: 2400,
        // reset: true,
        interval: 100,
        scale: 0.9,
        viewFactor: 0.9,
    });

        // Get the button:
    let mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }

</script>
</body>
</html>