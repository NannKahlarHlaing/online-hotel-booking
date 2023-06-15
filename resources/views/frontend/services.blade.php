@extends('frontend.index')

@section('content')

<div class="banner-text scroll-left text-center">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center">Services</h3>
            <p class="scroll-bottom text-center">Discover more than just comfort at {{ env('HOTEl_NAME') }}</p>
        </div>
    </div>
</div>
<section class="pt-5">
    <div class="container">
        <div class="row mb-5 d-flex justify-content-center">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-12">
                    <h1 class="text-color my-3">Amazing Services</h1>
                </div>
                <div class="col-md-6">
                    <p class="my-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam eu sapien bibendum, rutrum libero vitae, gravida dui. Proin dictum sem mi, a commodo nunc porttitor et. Suspendisse potenti. Nam euismod sagittis lorem vel venenatis. Mauris placerat mauris eros, nec sollicitudin massa ultrices eu. Curabitur efficitur nulla nec lacus tincidunt, sit amet congue dolor tincidunt. Aenean pulvinar sapien a fringilla facilisis. Nam quis lorem et tellus gravida venenatis ac nec metus. Nullam imperdiet euismod lorem, ac maximus nulla iaculis eget. Morbi rutrum eleifend orci in consectetur. Suspendisse a magna eget nulla tristique porttitor eget a velit. Donec nec eleifend tellus. Ut efficitur urna neque, id ornare mi viverra eget.</p>  
                </div>
                <div class="col-md-6">
                    <div class="row d-flex justify-content-center my-4" style="column-count:3;column-gap: 20px;">
                        <div class="col-lg-3 rounded-0 text-center single-service mb-2" >
                            <i class="fa-solid fa-champagne-glasses h1 p-3 "></i>
                            <p>Pool Beachbar</p>
                        </div>
                        <div class="col-lg-3 rounded-0 text-center single-service mb-2">
                            <i class="fa-solid fa-water-ladder h1 p-3 "></i>
                            <p>Pool Beachbar</p>
                        </div>
                        <div class="col-lg-3 rounded-0 text-center single-service mb-2">
                            <i class="fa-solid fa-umbrella-beach h1 p-3 "></i>
                            <p>Pool Beachbar</p>
                        </div>
                    </div>
                </div>
                {{-- </div> --}}
            </div>
        </div>    
       
        <div class="row mt-5 d-flex justify-content-center">
            <div class="col-lg-10">
                <div class="row ">
                    <div class="col-lg-4 mb-3">
                      <div class="rounded-0 text-center single-service-1" style="background-image: url('/images/spa1-2.jpg'); background-position: center; background-size: cover;">
                        <div class="col-12 single-service-2">
                          <i class="fa-solid fa-water-ladder h1 p-3 "></i>
                          <h3>Wellness</h3>
                          <p>Pool Beachbar Pool Beachbar Pool Beachbar Pool Beachbar Pool Beachbar Pool Beachbar Pool Beachbar</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 mb-3">
                      <div class="rounded-0 text-center single-service-1" style="background-image: url('/images/spa2.jpg'); background-position: center; background-size: cover;">
                        <div class="col-12 single-service-2">
                          <i class="fa-solid fa-water-ladder h1 p-3 "></i>
                          <h3>Spa Center</h3>
                          <p>Pool Beachbar Pool Beachbar Pool Beachbar Pool Beachbar Pool Beachbar Pool Beachbar Pool Beachbar</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 mb-3">
                      <div class="rounded-0 text-center single-service-1" style="background-image: url('/images/spa1-1.jpg'); background-position: center; background-size: cover;">
                        <div class="col-12 single-service-2">
                          <i class="fa-solid fa-water-ladder h1 p-3 "></i>
                          <h3>Lounge bar</h3>
                          <p>Pool Beachbar Pool Beachbar Pool Beachbar Pool Beachbar Pool Beachbar Pool Beachbar Pool Beachbar</p>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
            
        <div class="row mt-5 d-flex justify-content-center text-white-50">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <i class="fa-solid fa-person-biking h1  "></i>
                            </div>
                            <div class="col-12 mb-3">
                                <h3 class="text-white text-capitalize">Bike Rentals</h3>
                            </div>
                            <div class="col-12 mb-5">
                                <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500,</p>
                            </div>
                        </div>
                    </div>  
                    <div class="col-md-6 col-lg-4">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <i class="fa-solid fa-ship h1"></i>
                            </div>
                            <div class="col-12 mb-3">
                                <h3 class="text-white text-capitalize">Boat Trip</h3>
                            </div>
                            <div class="col-12 mb-5">
                                <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500,</p>
                            </div>
                        </div>
                    </div>  
                    <div class="col-md-6 col-lg-4">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <i class="fa-solid fa-utensils h1"></i>
                            </div>
                            <div class="col-12 mb-3">
                                <h3 class="text-white text-capitalize">Restaurants</h3>
                            </div>
                            <div class="col-12 mb-5">
                                <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500,</p>
                            </div>
                        </div>
                    </div>  
                    <div class="col-md-6 col-lg-4">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <i class="fa-solid fa-utensils h1"></i>
                            </div>
                            <div class="col-12 mb-3">
                                <h3 class="text-white text-capitalize">Massages</h3>
                            </div>
                            <div class="col-12 mb-5">
                                <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500,</p>
                            </div>
                        </div>
                    </div>  
                    <div class="col-md-6 col-lg-4">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <i class="fa-solid fa-money-check-dollar h1"></i>
                            </div>
                            <div class="col-12 mb-3">
                                <h3 class="text-white text-capitalize">Event Tickets</h3>
                            </div>
                            <div class="col-12 mb-5">
                                <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500,</p>
                            </div>
                        </div>
                    </div>  
                    <div class="col-md-6 col-lg-4">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <i class="fa-solid fa-person-hiking h1"></i>
                            </div>
                            <div class="col-12 mb-3">
                                <h3 class="text-white text-capitalize">Hiking</h3>
                            </div>
                            <div class="col-12 mb-5">
                                <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500,</p>
                            </div>
                        </div>
                    </div>  
                    
                </div>
            </div>    
        </div> 
    </div>
 
</section>

@endsection
