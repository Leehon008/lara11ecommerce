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
                                                <a href="##">Pedestrian Gates</a>
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
                            <img loading="lazy" class="h-auto img-fluid" src="{{ asset('assets/images/about-us.jpg') }}"
                                width="700" height="350" alt="Best for Creative" />

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

                <div class="products-grid row row-cols-2 row-cols-md-3" id="products-grid">
                    @foreach ($fProducts as $product)
                        <div class="product-card-wrapper">
                            <div class="product-card mb-3 mb-md-4 mb-xxl-5">
                                <div class="pc__img-wrapper">
                                    <div class="swiper-container background-img js-swiper-slider"
                                        data-settings='{"resizeObserver": true}'>
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <a
                                                    href="{{ route('shop.product.details', ['product_slug' => $product->slug]) }}"><img
                                                        loading="lazy"
                                                        src="{{ asset('uploads/products') }}/{{ $product->image }}"
                                                        width="330" height="400" alt="{{ $product->name }}"
                                                        class="pc__img"></a>
                                            </div>
                                            <div class="swiper-slide">
                                                @foreach (explode(',', $product->images) as $img)
                                                    <a
                                                        href="{{ route('shop.product.details', ['product_slug' => $product->slug]) }}"><img
                                                            loading="lazy"
                                                            src="{{ asset('uploads/products') }}/{{ $img }}"
                                                            width="330" height="400" alt="{{ $product->name }}"
                                                            class="pc__img"></a>
                                                @endforeach
                                            </div>
                                        </div>
                                        <span class="pc__img-prev"><svg width="7" height="11" viewBox="0 0 7 11"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <use href="#icon_prev_sm" />
                                            </svg></span>
                                        <span class="pc__img-next"><svg width="7" height="11" viewBox="0 0 7 11"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <use href="#icon_next_sm" />
                                            </svg></span>
                                    </div>
                                    @if (Cart::instance('cart')->content()->where('id', $product->id)->count() > 0)
                                        <a href="{{ route('cart.index') }}"
                                            class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium btn btn-warning mb-3">Go
                                            to Cart</a>
                                    @else
                                        <form name="addtocart-form" method="post" action="{{ route('cart.add') }}">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $product->id }}" />
                                            <input type="hidden" name="quantity" value="1" />
                                            <input type="hidden" name="name" value="{{ $product->name }}" />
                                            <input type="hidden" name="price"
                                                value="{{ $product->sale_price == '' ? $product->regular_price : $product->sale_price }}" />
                                            <button type="submit"
                                                class="pc__atc btn anim_appear-bottom btn position-absolute border-0 text-uppercase fw-medium"
                                                data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
                                        </form>
                                    @endif
                                </div>

                                <div class="pc__info position-relative">
                                    <p class="pc__category"> {{ $product->brand->category->name }}</p>
                                    <h6 class="pc__title"><a
                                            href="{{ route('shop.product.details', ['product_slug' => $product->slug]) }}">{{ $product->name }}</a>
                                    </h6>
                                    <div class="product-card__price d-flex">
                                        <span class="money price">
                                            @if ($product->sale_price)
                                                <s>$ {{ $product->regular_price }}</s> ${{ $product->sale_price }}
                                            @else
                                                ${{ $product->regular_price }}
                                            @endif
                                        </span>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
               <!-- /.row -->

                <div class="text-center mt-2">
                    <a class="btn-link btn-link_lg default-underline text-uppercase fw-medium" href="{{route('shop.index')}}">Load
                        More</a>
                </div>
            </section>
        </div>

        <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>
    </main>

@endsection
