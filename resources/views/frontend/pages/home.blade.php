@extends('frontend.layout.app')
@section('title', 'Best For Creative Zimbabwe')
@section('content')
    <main>
        <section class="swiper-container js-swiper-slider swiper-number-pagination slideshow"
            data-settings='{
        "autoplay": {
          "delay": 5000
        },
        "slidesPerView": 1,
        "effect": "fade",
        "loop": true
      }'>
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="overflow-hidden position-relative h-100">
                        <div class="slideshow-character position-absolute bottom-0 pos_right-center">
                            <img loading="lazy" src="{{ asset('assets/images/metal-01.png') }}" alt="Best for Creative"
                                class="slideshow-character__img animate animate_fade animate_btt animate_delay-9 w-auto h-auto" />

                        </div>
                        <div class="slideshow-text container position-absolute start-50 top-50 translate-middle">
                            <h6
                                class="text_dash text-uppercase fs-base fw-medium animate animate_fade animate_btt animate_delay-3">
                                Metal Fabrication, Welding Services & Steel Supplier
                            </h6>
                            <h2 class="h1 fw-normal mb-0 animate animate_fade animate_btt animate_delay-5">
                                Best for Creative
                            </h2>

                            <a href="{{ route('shop.index') }}"
                                class="btn-link btn-link_lg default-underline fw-medium animate animate_fade animate_btt animate_delay-7 mt-5">SHOP
                                NOW</a>
                        </div>
                    </div>
                </div>


            </div>

            <div class="container">
                <div
                    class="slideshow-pagination slideshow-number-pagination d-flex align-items-center position-absolute bottom-0 mb-5">
                </div>
            </div>
        </section>
        <div class="container mw-1620 bg-white border-radius-10">
            <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>


            <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>

            <!-- services -->
            <section class="hot-deals container mt-5">

                <div class="row">
                    <div
                        class="col-md-6 col-lg-4 col-xl-20per d-flex align-items-center flex-column justify-content-center py-4 align-items-md-start">
                        <h2>SERVICES</h2>
                        <h4 class="fw-bold">WHAT WE DO BEST</h4>
                        <a href="services.html" class="btn-link default-underline text-uppercase fw-medium mt-3">View
                            All</a>
                    </div>
                    <div class="col-md-6 col-lg-8 col-xl-80per">
                        <div class="position-relative">
                            <div class="swiper-container js-swiper-slider"
                                data-settings='{
                  "autoplay": {
                    "delay": 5000
                  },
                  "slidesPerView": 4,
                  "slidesPerGroup": 4,
                  "effect": "none",
                  "loop": false,
                  "breakpoints": {
                    "320": {
                      "slidesPerView": 2,
                      "slidesPerGroup": 2,
                      "spaceBetween": 14
                    },
                    "768": {
                      "slidesPerView": 2,
                      "slidesPerGroup": 3,
                      "spaceBetween": 24
                    },
                    "992": {
                      "slidesPerView": 3,
                      "slidesPerGroup": 1,
                      "spaceBetween": 30,
                      "pagination": false
                    },
                    "1200": {
                      "slidesPerView": 4,
                      "slidesPerGroup": 1,
                      "spaceBetween": 30,
                      "pagination": false
                    }
                  }
                }'>
                                <div class="swiper-wrapper">

                                    <div class="swiper-slide product-card product-card_style3">
                                        <div class="pc__img-wrapper">
                                            <a href="##">
                                                <img loading="lazy" src="{{ asset('assets/images/services-01.jpg') }}"
                                                    width="258" height="313" alt="Best for Creative" class="pc__img" />

                                            </a>
                                        </div>

                                        <div class="pc__info position-relative">
                                            <h6 class="pc__title">
                                                <a href="##">Window Frames</a>
                                            </h6>

                                        </div>
                                    </div>
                                    <div class="swiper-slide product-card product-card_style3">
                                        <div class="pc__img-wrapper">
                                            <a href="##">
                                                <img loading="lazy" src="{{ asset('assets/images/services-02.jpg') }}"
                                                    width="258" height="313" alt="Best for Creative" class="pc__img" />

                                            </a>
                                        </div>

                                        <div class="pc__info position-relative">
                                            <h6 class="pc__title">
                                                <a href="##">Sliding Gates</a>
                                            </h6>

                                        </div>
                                    </div>
                                    <div class="swiper-slide product-card product-card_style3">
                                        <div class="pc__img-wrapper">
                                            <a href="##">
                                                <img loading="lazy" src="{{ asset('assets/images/services-03.jpg') }}"
                                                    width="258" height="313" alt="Best for Creative" class="pc__img" />

                                            </a>
                                        </div>

                                        <div class="pc__info position-relative">
                                            <h6 class="pc__title">
                                                <a href="##">Pallisades</a>
                                            </h6>

                                        </div>
                                    </div>
                                    <div class="swiper-slide product-card product-card_style3">
                                        <div class="pc__img-wrapper">
                                            <a href="##">
                                                <img loading="lazy" src="{{ asset('assets/images/services-04.jpg') }}"
                                                    width="258" height="313" alt="Best for Creative" class="pc__img" />

                                            </a>
                                        </div>

                                        <div class="pc__info position-relative">
                                            <h6 class="pc__title">
                                                <a href="##">Sliding Gates</a>
                                            </h6>

                                        </div>
                                    </div>
                                    <div class="swiper-slide product-card product-card_style3">
                                        <div class="pc__img-wrapper">
                                            <a href="##">
                                                <img loading="lazy" src="{{ asset('assets/images/services-05.jpg') }}"
                                                    width="258" height="313" alt="Best for Creative" class="pc__img" />

                                            </a>
                                        </div>

                                        <div class="pc__info position-relative">
                                            <h6 class="pc__title">
                                                <a href="##">Window Frames</a>
                                            </h6>

                                        </div>
                                    </div>
                                    <div class="swiper-slide product-card product-card_style3">
                                        <div class="pc__img-wrapper">
                                            <a href="##">
                                                <img loading="lazy" src="{{ asset('assets/images/services-06.jpg') }}"
                                                    width="258" height="313" alt="Best for Creative" class="pc__img" />

                                            </a>
                                        </div>

                                        <div class="pc__info position-relative">
                                            <h6 class="pc__title">
                                                <a href="##">Door Frames</a>
                                            </h6>

                                        </div>
                                    </div>


                                </div>
                                <!-- /.swiper-wrapper -->
                            </div>
                            <!-- /.swiper-container js-swiper-slider -->
                        </div>
                        <!-- /.position-relative -->
                    </div>
                </div>
            </section>

            <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>


            <section class="category-banner container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="category-banner__item border-radius-10 mb-5">
                            <img loading="lazy" class="h-auto" src="{{ asset('assets/images/about-us.jpg') }}"
                                width="690" height="665" alt="" />

                            <div class="category-banner__item-content">
                                <h3 class="mb-0">ABOUT US</h3>
                                <a href="#best-for-creative"
                                    class="btn-link default-underline text-uppercase fw-medium">BEST FOR CREATIVE</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="category-banner__item border-radius-10 mb-5">
                            <h2 class="mb-5 text-center">About Best For Creative (Pvt) Ltd</h2>
                            <p>
                                "Best for Creative Pvt Ltd" is a multifaceted company that specializes in metal fabrication,
                                welding services, and steel supply.
                                With a primary focus on crafting gates and various metal products, they have established
                                themselves as experts in the field of metalwork.

                            </p>
                            <h3>Metal Fabrication and Welding Services:</h3>
                            <p class="mt-2">

                                The company excels in the design, fabrication, and installation of a wide range of metal
                                products, with a specialization in gates.
                                Whether it's driveway gates, garden gates, security gates, or decorative gates, they offer
                                custom solutions tailored to the
                                unique requirements of their clients. Their skilled craftsmen and welders ensure that each
                                product is not only aesthetically
                                pleasing but also structurally sound and durable.

                            </p>
                            <div class="mt-5">
                                <a href="{{ url('/about') }}" class=" btn btn-primary"> Read More</a>

                            </div>


                        </div>
                    </div>
                </div>
            </section>

            <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>


            <!-- dynamic section start | shop -->
            <section class="products-grid container my-5">
                <h2 class="section-title text-center mb-5 pb-xl-3 mb-xl-4">
                    SHOP
                </h2>

                <div class="row">
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="product-card product-card_style3 mb-3 mb-md-4 mb-xxl-5">
                            <div class="pc__img-wrapper">
                                <a href="details.html">
                                    <img loading="lazy" src="{{ asset('assets/images/services-02.jpg') }}"
                                        width="330" height="400" alt="Best for Creative" class="pc__img" />
                                </a>
                            </div>

                            <div class="pc__info position-relative">
                                <h6 class="pc__title">
                                    <a href="details.html">Sliding Gate</a>
                                </h6>
                                <div class="product-card__price d-flex align-items-center">
                                    <span class="money price text-secondary">$101</span>
                                </div>

                                <div
                                    class="anim_appear-bottom position-absolute bottom-0 start-0 d-none d-sm-flex align-items-center bg-body">
                                    <button
                                        class="btn-link btn-link_lg me-4 text-uppercase fw-medium js-add-cart js-open-aside"
                                        data-aside="cartDrawer" title="Add To Cart">
                                        Add To Cart
                                    </button>
                                    <button class="btn-link btn-link_lg me-4 text-uppercase fw-medium js-quick-view"
                                        data-bs-toggle="modal" data-bs-target="#quickView" title="Quick view">
                                        <span class="d-none d-xxl-block">Quick View</span>
                                        <span class="d-block d-xxl-none"><svg width="18" height="18"
                                                viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <use href="#icon_view" />
                                            </svg></span>
                                    </button>
                                    <button class="pc__btn-wl bg-transparent border-0 js-add-wishlist"
                                        title="Add To Wishlist">
                                        <svg width="16" height="16" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <use href="#icon_heart" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="product-card product-card_style3 mb-3 mb-md-4 mb-xxl-5">
                            <div class="pc__img-wrapper">
                                <a href="details.html">
                                    <img loading="lazy" src="{{ asset('assets/images/services-03.jpg') }}"
                                        width="330" height="400" alt="Best for Creative" class="pc__img" />
                                </a>
                            </div>

                            <div class="pc__info position-relative">
                                <h6 class="pc__title">
                                    <a href="details.html">Sliding Gate</a>
                                </h6>
                                <div class="product-card__price d-flex align-items-center">
                                    <span class="money price text-secondary">$101</span>
                                </div>

                                <div
                                    class="anim_appear-bottom position-absolute bottom-0 start-0 d-none d-sm-flex align-items-center bg-body">
                                    <button
                                        class="btn-link btn-link_lg me-4 text-uppercase fw-medium js-add-cart js-open-aside"
                                        data-aside="cartDrawer" title="Add To Cart">
                                        Add To Cart
                                    </button>
                                    <button class="btn-link btn-link_lg me-4 text-uppercase fw-medium js-quick-view"
                                        data-bs-toggle="modal" data-bs-target="#quickView" title="Quick view">
                                        <span class="d-none d-xxl-block">Quick View</span>
                                        <span class="d-block d-xxl-none"><svg width="18" height="18"
                                                viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <use href="#icon_view" />
                                            </svg></span>
                                    </button>
                                    <button class="pc__btn-wl bg-transparent border-0 js-add-wishlist"
                                        title="Add To Wishlist">
                                        <svg width="16" height="16" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <use href="#icon_heart" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="product-card product-card_style3 mb-3 mb-md-4 mb-xxl-5">
                            <div class="pc__img-wrapper">
                                <a href="details.html">
                                    <img loading="lazy" src="{{ asset('assets/images/services-04.jpg') }}"
                                        width="330" height="400" alt="Best for Creative" class="pc__img" />
                                </a>
                            </div>

                            <div class="pc__info position-relative">
                                <h6 class="pc__title">
                                    <a href="details.html">Sliding Gate</a>
                                </h6>
                                <div class="product-card__price d-flex align-items-center">
                                    <span class="money price text-secondary">$101</span>
                                </div>

                                <div
                                    class="anim_appear-bottom position-absolute bottom-0 start-0 d-none d-sm-flex align-items-center bg-body">
                                    <button
                                        class="btn-link btn-link_lg me-4 text-uppercase fw-medium js-add-cart js-open-aside"
                                        data-aside="cartDrawer" title="Add To Cart">
                                        Add To Cart
                                    </button>
                                    <button class="btn-link btn-link_lg me-4 text-uppercase fw-medium js-quick-view"
                                        data-bs-toggle="modal" data-bs-target="#quickView" title="Quick view">
                                        <span class="d-none d-xxl-block">Quick View</span>
                                        <span class="d-block d-xxl-none"><svg width="18" height="18"
                                                viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <use href="#icon_view" />
                                            </svg></span>
                                    </button>
                                    <button class="pc__btn-wl bg-transparent border-0 js-add-wishlist"
                                        title="Add To Wishlist">
                                        <svg width="16" height="16" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <use href="#icon_heart" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="product-card product-card_style3 mb-3 mb-md-4 mb-xxl-5">
                            <div class="pc__img-wrapper">
                                <a href="details.html">
                                    <img loading="lazy" src="{{ asset('assets/images/services-05.jpg') }}"
                                        width="330" height="400" alt="Best for Creative" class="pc__img" />
                                </a>

                            </div>

                            <div class="pc__info position-relative">
                                <h6 class="pc__title">Window Frame</h6>
                                <div class="product-card__price d-flex align-items-center">
                                    <span class="money price-old">$101</span>
                                    <span class="money price text-secondary">$201</span>
                                </div>

                                <div
                                    class="anim_appear-bottom position-absolute bottom-0 start-0 d-none d-sm-flex align-items-center bg-body">
                                    <button
                                        class="btn-link btn-link_lg me-4 text-uppercase fw-medium js-add-cart js-open-aside"
                                        data-aside="cartDrawer" title="Add To Cart">
                                        Add To Cart
                                    </button>
                                    <button class="btn-link btn-link_lg me-4 text-uppercase fw-medium js-quick-view"
                                        data-bs-toggle="modal" data-bs-target="#quickView" title="Quick view">
                                        <span class="d-none d-xxl-block">Quick View</span>
                                        <span class="d-block d-xxl-none"><svg width="18" height="18"
                                                viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <use href="#icon_view" />
                                            </svg></span>
                                    </button>
                                    <button class="pc__btn-wl bg-transparent border-0 js-add-wishlist"
                                        title="Add To Wishlist">
                                        <svg width="16" height="16" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <use href="#icon_heart" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.row -->

                <div class="text-center mt-2">
                    <a class="btn-link btn-link_lg default-underline text-uppercase fw-medium" href="#">Load
                        More</a>
                </div>
            </section>
        </div>

        <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>
    </main>

@endsection
