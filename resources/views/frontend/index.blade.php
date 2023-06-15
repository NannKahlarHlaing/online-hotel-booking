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
                                <li class="nav-item col" href="{{ url('/book') }}">
                                    <a class="nav-link ">Book</a>
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