@extends('frontend.layout.app')
@section('title', 'Best For Creative Contact Details')
@section('content')
<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="contact-us container">
      <div class="mw-930">
        <h2 class="page-title">CONTACT US</h2>
      </div>
    </section>

    <hr class="mt-2 text-secondary" />
    <div class="mb-4 pb-4"></div>

    <section class="contact-us container">
      
      <div class="mw-930 mb-5">
        <div class="container">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 ">CONTACT DETAILS</h5>
              <div class="contact-info" style="font-size: medium;">
                <p><i class="fa fa-map-marker text-red"></i> 12345 Chitungwiza Industry</p>
                <p><i class="fa fa-phone text-red"></i> +263773235698</p>
                <p><i class="fa fa-envelope text-red"></i> sales@bestforcreative.co.zw</p>
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="mx-auto mb-5">
        <!--<img src="assets/images/bfc-location.png" alt="BFC Contact Details" class=" img-fluid mb-5">-->
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15176.38451321488!2d31.052985!3d-18.0207419!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x193199357c6b8de1%3A0xb6dcf6042a34655b!2sBest%20For%20Creative%20Pvt%20Ltd!5e0!3m2!1sen!2szw!4v1731489383475!5m2!1sen!2szw" width="1200" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </section>
  </main>
@endsection