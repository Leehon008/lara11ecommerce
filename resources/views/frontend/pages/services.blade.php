@extends('frontend.layout.app')
@section('title', 'Best For Creative Services')
@section('content')
  <main class="pt-90">
    <div class="mb-md-1 pb-md-3"></div>

    <section class="products-carousel container">
      <h2 class="h3 text-uppercase mb-4 mt-5 pb-xl-2 mb-xl-4 text-center">
        <strong>SERVICES</strong>
      </h2>

      <div id="related_products" class="position-relative">
        <div class="swiper-container js-swiper-slider" data-settings='{
            "autoplay": false,
            "slidesPerView": 4,
            "slidesPerGroup": 4,
            "effect": "none",
            "loop": true,
            "pagination": {
              "el": "#related_products .products-pagination",
              "type": "bullets",
              "clickable": true
            },
            "navigation": {
              "nextEl": "#related_products .products-carousel__next",
              "prevEl": "#related_products .products-carousel__prev"
            },
            "breakpoints": {
              "320": {
                "slidesPerView": 2,
                "slidesPerGroup": 2,
                "spaceBetween": 14
              },
              "768": {
                "slidesPerView": 3,
                "slidesPerGroup": 3,
                "spaceBetween": 24
              },
              "992": {
                "slidesPerView": 4,
                "slidesPerGroup": 4,
                "spaceBetween": 30
              }
            }
          }'>
          <div class="swiper-wrapper">

            <div class="swiper-slide product-card">
              <div class="pc__img-wrapper">
                <a href="#">
                  <img loading="lazy" src="{{ asset('assets/images/door-frame.jpg') }}" width="330" height="400"
                    alt="Best for Creative" class="pc__img" />
                </a>
              </div>

              <div class="pc__info position-relative">

                <h6 class="pc__title">
                  <a href="details.html">Sliding Gates</a>
                </h6>
              </div>
            </div>

            <div class="swiper-slide product-card">
              <div class="pc__img-wrapper">
                <a href="#">
                  <img loading="lazy" src="{{ asset('assets/images/Pallisades.jpg') }}" width="330" height="400"
                    alt="Best for Creative" class="pc__img" />
                </a>
              </div>

              <div class="pc__info position-relative">

                <h6 class="pc__title">
                  <a href="details.html">Pallisades</a>
                </h6>
              </div>
            </div>

            <div class="swiper-slide product-card">
              <div class="pc__img-wrapper">
                <a href="#">
                  <img loading="lazy" src="{{ asset('assets/images/Sliding-door.jpg') }}" width="330" height="400"
                    alt="Best for Creative" class="pc__img" />
                </a>
              </div>

              <div class="pc__info position-relative">

                <h6 class="pc__title">
                  <a href="#">Sliding Door</a>
                </h6>
              </div>
            </div>

            <div class="swiper-slide product-card">
              <div class="pc__img-wrapper">
                <a href="#">
                  <img loading="lazy" src="{{ asset('assets/images/veranda-screen.jpg') }}" width="330" height="400"
                    alt="Best for Creative" class="pc__img" />
                </a>
              </div>

              <div class="pc__info position-relative">

                <h6 class="pc__title">
                  <a href="details.html">Veranda Screens</a>
                </h6>
              </div>
            </div>

            <div class="swiper-slide product-card">
              <div class="pc__img-wrapper">
                <a href="#">
                  <img loading="lazy" src="{{ asset('assets/images/sliding-gate.jpg') }}" width="330" height="400"
                    alt="Best for Creative" class="pc__img" />
                </a>
              </div>

              <div class="pc__info position-relative">

                <h6 class="pc__title">
                  <a href="details.html">Sliding Gates</a>
                </h6>
              </div>
            </div>

            <div class="swiper-slide product-card">
              <div class="pc__img-wrapper">
                <a href="#">
                  <img loading="lazy" src="{{ asset('assets/images/steel-supplier.jpg') }}" width="330" height="400"
                    alt="Best for Creative" class="pc__img" />
                </a>
              </div>

              <div class="pc__info position-relative">

                <h6 class="pc__title">
                  <a href="details.html">Steel Supplier</a>
                </h6>
              </div>
            </div>

            <div class="swiper-slide product-card">
              <div class="pc__img-wrapper">
                <a href="#">
                  <img loading="lazy" src="{{ asset('assets/images/window-frame.jpg') }}" width="330" height="400"
                    alt="Best for Creative" class="pc__img" />
                </a>
              </div>

              <div class="pc__info position-relative">

                <h6 class="pc__title">
                  <a href="details.html">Window Frame</a>
                </h6>
              </div>
            </div>

            <div class="swiper-slide product-card">
              <div class="pc__img-wrapper">
                <a href="#">
                  <img loading="lazy" src="{{ asset('assets/images/window-screens.jpg') }}" width="330" height="400"
                    alt="Best for Creative" class="pc__img" />
                </a>
              </div>

              <div class="pc__info position-relative">

                <h6 class="pc__title">
                  <a href="details.html">Window Screens</a>
                </h6>
              </div>
            </div>


          </div>
          <!-- /.swiper-wrapper -->
        </div>
        <!-- /.swiper-container js-swiper-slider -->

        <div class="products-carousel__prev position-absolute top-50 d-flex align-items-center justify-content-center">
          <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
            <use href="#icon_prev_md" />
          </svg>
        </div>
        <!-- /.products-carousel__prev -->
        <div class="products-carousel__next position-absolute top-50 d-flex align-items-center justify-content-center">
          <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
            <use href="#icon_next_md" />
          </svg>
        </div>
        <!-- /.products-carousel__next -->

        <div class="products-pagination mt-4 mb-5 d-flex align-items-center justify-content-center"></div>
        <!-- /.products-pagination -->
      </div>
      <!-- /.position-relative -->
    </section>
    <!-- /.products-carousel container -->
  </main>
@endsection