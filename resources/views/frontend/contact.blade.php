@extends('frontend.index')

@section('content')

<div class="banner-text scroll-left text-center">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center">Contact</h3>
            <p class="scroll-bottom text-center">Discover more than just comfort at {{ env('HOTEl_NAME') }}</p>
        </div>
    </div>
</div>
<section class="pt-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-6">
                <h1 class="text-color my-3 mb-4">Contact Information</h1>
                <div class="row form bg-transparent">
                    <p><i class="fa-solid fa-location-dot fa-lg me-3"></i> {{ env('ADDRESS') }}</p>
                <p><i class="fa-solid fa-mobile-screen-button fa-lg me-3"></i> {{ env('CONTACT') }}</p>
                <p><i class="fa-regular fa-envelope fa-lg me-3"></i> {{ env('EMAIL') }}</p>
                <p><i class="fa-regular fa-clock fa-lg me-3"></i> Everyday: 06:00 -22:00</p>
                </div>
                
                <div class="row d-flex justify-content-start">
                    <h1 class="text-color my-3">Follow us on:</h1>
                    <div class="col-1 " ><i class="fa-brands fa-facebook-f fa-lg border border-1 rounded-circle p-2" style="width:20px; color:#fff;"></i></div>
                    <div class="col-1"><i class="fa-brands fa-instagram fa-lg border border-1 rounded-circle p-2" style="width:20px; color:#fff;"></i></div>
                    <div class="col-1"><i class="fa-brands fa-linkedin-in fa-lg border border-1 rounded-circle p-2" style="width:20px; color:#fff;"></i></div>
                    <div class="col-1"><i class="fa-brands fa-youtube fa-lg border border-1 rounded-circle p-2" style="width:20px; color:#fff;"></i></div>
                </div>
               
            </div>
            <div class="col-md-6 border border-1 rounded-0">
                <h1 class="text-color my-3 px-5">Write us ...</h1>
                <form class="form bg-transparent px-5" method="POST" action="{{ url('/contact') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                        <input type="email" class="form-control rounded-0" id="exampleFormControlInput1" >
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <input type="email" class="form-control rounded-0" id="exampleFormControlInput1" >
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Phone</label>
                        <input type="email" class="form-control rounded-0" id="exampleFormControlInput1" >
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                        <textarea class="form-control rounded-0" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>

                </form>
            </div>
        </div>        
    </div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3695.82919229772!2d95.12567475599553!3d22.132487264259982!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30ca9fd30a87598d%3A0x66ce2428181d6108!2sKan%20Thar%20Yar!5e0!3m2!1sen!2smm!4v1686042351231!5m2!1sen!2smm" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>
<script>
    
    
</script>
@endsection