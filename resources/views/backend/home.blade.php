<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hotel Booking</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<section class="container-fluid">
    <div class="row">
        <div class="">
            <div class="wrapper">
                <!-- Sidebar -->
                <div class="row">
                    <div class="">
                        <div class="sidebar-header">
                            <div class="row">
                                <div class="col-lg-8">
                                    <h2>Hotel Booking</h2>
                                </div>
                                <div class="col-lg-4">
                                    <nav class="navbar navbar-expand-lg navbar-light">
                                        <div class="container-fluid">
                                            <button type="button" id="sidebarCollapse" class="btn btn-info">
                                                <!-- <i class="fas fa-align-left"></i> -->
                                                <span><i class="fa-solid fa-bars"></i></span>
                                            </button>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <nav id="sidebar">
                            
                            <ul class="list-unstyled components">
                                <li class="active">
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Rooms
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{ route('rooms')}}">Rooms</a>
                                        <a class="dropdown-item" href="{{ route('room_types')}}">Room Type</a>
                                    </div>
                                </div>
                                </li>
                                <li>
                                    <a href="{{ route('facilities') }}">Facilities</a>
                                </li>
                                <li>
                                    <a href="#">Portfolio</a>
                                </li>
                                <li>
                                    <a href="#">Contact</a>
                                </li>
                            </ul>     
                        </nav>
                        
                    </div>
                    {{-- <div class="col-lg-1"> --}}
                        
                    {{-- </div>     --}}
                </div>                
            </div>
        </div>
        <div class="col-lg-8">
        <div class="space"></div>
        <div class="con">
            @yield('content')
        </div>
        </div>
    </div>
</section>

    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .con{
            width: 100%;
            align: left;
        }
        .wrapper {
            display: flex;
            width: 100%;
            align-items: stretch;
            padding-left: 15px;
        }

        #sidebar {
            min-width: 250px;
            max-width: 250px;
        }

        #sidebar.active {
            margin-left: -250px;
        }
        #sidebar {
            min-width: 250px;
            max-width: 250px;
            min-height: 20vh;
        }
        a[data-toggle="collapse"] {
            position: relative;
        }

        .dropdown-toggle::after {
            display: block;
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
        }
        @media (max-width: 768px) {
            #sidebar {
                margin-left: -250px;
            }
            #sidebar.active {
                margin-left: 0;
            }
        }
        @import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";


        body {
            font-family: 'Poppins', sans-serif;
            /* background: #343e4e; */
            background: linear-gradient(0deg,#3c4b64,#212334);
        }

        p {
            font-family: 'Poppins', sans-serif;
            font-size: 1.1em;
            font-weight: 300;
            line-height: 1.7em;
            color: #999;
        }

        a, a:hover, a:focus {
            color: inherit;
            text-decoration: none;
            transition: all 0.3s;
        }

        #sidebar {
            /* don't forget to add all the previously mentioned styles here too */
            background-image: linear-gradient(0deg,#3c4b64,#212334);
            color: #fff;
            transition: all 0.3s;
            border-right: 1px solid #47748b;
        }

        #sidebar .sidebar-header {
            padding: 20px;
            background-image: linear-gradient(0deg,#3c4b64,#212334);
        }

        #sidebar ul.components {
            padding: 20px 0;
            border-bottom: 1px solid #47748b;
        }

        #sidebar ul p {
            color: #fff;
            padding: 10px;
        }

        #sidebar ul li a {
            padding: 10px;
            font-size: 1.1em;
            display: block;
        }
        #sidebar ul li a:hover {
            color: #7386D5;
            background: #fff;
        }

        #sidebar ul li.active > a, a[aria-expanded="true"] {
            color: #fff;
            background: #50878e;
        }
        ul ul a {
            font-size: 0.9em !important;
            padding-left: 30px !important;
            background-image: linear-gradient(0deg,#3c4b64,#212334);
        }
        .btn{
            color: #fff;
        }
        .btn:hover{
            color: #fff;
        }

        .space{
            margin-bottom: 20px;
        }

        /* content */
        .form-group label{
            color: #fff;
        }

        /* roomtypes */
        .table{
            background: #a3e3ed;
        }

        .ft-cl{
            color: #fff;
        }
    </style>
    <script>
        $(document).ready(function () {

        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });

        });
    </script>
</body>
</html>