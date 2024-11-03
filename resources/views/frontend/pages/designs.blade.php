@extends('frontend.layout.app')
@section('title', 'Best For Creative Services')
@section('content')
  <main class="pt-90">
    <div class="mb-md-1 pb-md-3"></div>

    <section class="container">
      <h2 class="h3 text-uppercase mb-4 mt-5 pb-xl-2 mb-xl-4 text-center">
        <strong>DESIGNS</strong>
      </h2>

        <div class="row">
            @foreach($brands as $brand)
                <div class="col-md-4">
                    <div class="">
                        <a href="#">
                            <!-- Display brand image from database -->
                            <img src="{{ asset('uploads/brands/' . $brand->image) }}" width="250" height="350" alt="{{ $brand->name }}" class="img-fluid" />
                        </a>
                    </div>

                    <div class="pc__info position-relative">
                        <h6 class="pc__title text-capitalize">
                            <!-- Display brand name from database -->
                            <a href="#">{{ $brand->name }}</a>
                        </h6>
                    </div>
                </div>
            @endforeach

        </div>
        <!-- /.swiper-container js-swiper-slider -->

      <!-- /.position-relative -->
    </section>
    <!-- /.products-carousel container -->
  </main>
@endsection