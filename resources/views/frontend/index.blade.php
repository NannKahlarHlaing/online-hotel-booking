<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Ba Thaung</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Berkshire+Swash&family=Castoro+Titling&family=Lobster&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/scrollreveal"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css" integrity="sha512-SgaqKKxJDQ/tAUAAXzvxZz33rmn7leYDYfBP+YoMRSENhf3zJyx3SBASt/OfeQwBHA1nxMis7mM3EV/oYT6Fdw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    
<section class="header bg-image">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mt-30 mb-30">{{ env('HOTEl_NAME') }}</h1>
            </div>
            <div class=" col-md-12">
                <div class="">
                <nav class="navbar navbar-expand-lg">
                    <div class="container">
                        <a class="navbar-brand col-2" href="#">Home</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                            </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0 col">
                                <li class="nav-item col">
                                    <a class="nav-link" aria-current="page" href="#">Rooms</a>
                                </li>
                                <li class="nav-item col">
                                    <a class="nav-link" href="#">Services</a>
                                </li>
                                <li class="nav-item col">
                                    <a class="nav-link ">Contact</a>
                                </li>
                                <li class="nav-item col">
                                    <a class="nav-link ">About</a>
                                </li>
                                <li class="nav-item col">
                                    <a class="nav-link ">Book</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                </div>
            </div>
            <div class="banner-text scroll-left text-center">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-center">Welcome</h2>
                        <p class="scroll-bottom text-center">to make your travel experience a genuine pleasure</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@yield('content')

<section class="footer">

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
</script>
</body>
</html>