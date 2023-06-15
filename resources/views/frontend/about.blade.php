@extends('frontend.index')

@section('content')

<div class="banner-text scroll-left text-center">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center">About Us</h3>
            <p class="scroll-bottom text-center">Discover more than just comfort at {{ env('HOTEl_NAME') }}</p>
        </div>
    </div>
</div>
<section>
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <h1 class="text-color my-5">{{ env('HOTEl_NAME') }} / 10 years of excellence</h1>
            </div>
            <div class="col-md-6">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam eu sapien bibendum, rutrum libero vitae, gravida dui. Proin dictum sem mi, a commodo nunc porttitor et. Suspendisse potenti. Nam euismod sagittis lorem vel venenatis. Mauris placerat mauris eros, nec sollicitudin massa ultrices eu. Curabitur efficitur nulla nec lacus tincidunt, sit amet congue dolor tincidunt. Aenean pulvinar sapien a fringilla facilisis. Nam quis lorem et tellus gravida venenatis ac nec metus. Nullam imperdiet euismod lorem, ac maximus nulla iaculis eget. Morbi rutrum eleifend orci in consectetur. Suspendisse a magna eget nulla tristique porttitor eget a velit. Donec nec eleifend tellus. Ut efficitur urna neque, id ornare mi viverra eget.</p>
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <div class="row d-flex justify-content-center align-items-center w-100">
                    <div class="col-lg-3 col-md-6 col-7">
                        <img src="{{ asset('images/about_1.png') }}" alt="" class="w-100">
                    </div>
                    <div class="col-lg-3 col-md-6 col-7">
                        <img src="{{ asset('images/about_2.png') }}" alt="" class="w-100">
                    </div>
                    <div class="col-lg-3 col-md-6 col-7">
                        <img src="{{ asset('images/about_3.png') }}" alt="" class="w-100">
                    </div>
                </div>                
            </div>
        </div>
        <hr>
        <div class="row pt-5">
            <div class="col-lg-6">
                <img src="{{ asset('images/milestones.jpg') }}" alt="" width="100%">
            </div>
            <div class="col-lg-6">
                <h1 class="text-color mt-3">Luxury Resort</h1>
                <p class="my-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam eu sapien bibendum, rutrum libero vitae, gravida dui. Proin dictum sem mi, a commodo nunc porttitor et. Suspendisse potenti. Nam euismod sagittis lorem vel venenatis. Mauris placerat mauris eros, nec sollicitudin massa ultrices eu. Curabitur efficitur nulla nec lacus tincidunt, sit amet congue dolor tincidunt. Aenean pulvinar sapien a fringilla facilisis. Nam quis lorem et tellus gravida venenatis ac nec metus. Nullam imperdiet euismod lorem, ac maximus nulla iaculis eget. Morbi rutrum eleifend orci in consectetur. Suspendisse a magna eget nulla tristique porttitor eget a velit. Donec nec eleifend tellus. Ut efficitur urna neque, id ornare mi viverra eget.</p>
                <div class="row">
                    <div class="col-md-4 text-center">
                        <p class="text-white counter-room">45</p>
                        <p>Room Available</p>
                        <div class="col-md-3 col-sm-6">
                            <div class="progress blue">
                                <span class="progress-left">
                                    <span class="progress-bar"></span>
                                </span>
                                <span class="progress-right">
                                    <span class="progress-bar"></span>
                                </span>
                                <div class="progress-value">90%</div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-4 text-center">
                        <p class="text-white"><span class="counter-tourist">21</span>K</p>
                        <p>Tourists this year</p>
                    </div>
                    <div class="col-md-4 text-center">
                        <p class="text-white counter-pool text-center">2</p>
                        <p>Swimming pools</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    
    $(document).ready(function(){
        $('.counter-room').each(function(){
            $(this).prop('Counter',0).animate({
                Counter: $(this).text()
            },{
                duration: 7000,
                easing: 'swing',
                step: function (now){
                    $(this).text(Math.ceil(now));
                }
            });
        });
        $('.counter-tourist').each(function(){
            $(this).prop('Counter',0).animate({
                Counter: $(this).text()
            },{
                duration: 9000,
                easing: 'swing',
                step: function (now){
                    $(this).text(Math.ceil(now));
                }
            });
        });
        $('.counter-pool').each(function(){
            $(this).prop('Counter',0).animate({
                Counter: $(this).text()
            },{
                duration: 3000,
                easing: 'swing',
                step: function (now){
                    $(this).text(Math.ceil(now));
                }
            });
        });
    });
</script>
@endsection