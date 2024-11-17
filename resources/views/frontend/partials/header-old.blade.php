<!-- mobile header  -->
<div class="header-mobile header_sticky">
    <div class="container d-flex align-items-center h-100">
        <a class="mobile-nav-activator d-block position-relative" href="#">
            <svg class="nav-icon" width="25" height="18" viewBox="0 0 25 18" xmlns="http://www.w3.org/2000/svg">
                <use href="#icon_nav" />
            </svg>
            <button class="btn-close-lg position-absolute top-0 start-0 w-100"></button>
        </a>

        <div class="logo">
            <a href="index.html">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Best for creative" class="logo__image d-block" />
            </a>
        </div>

        
                @guest
                    <div class="header-tools__item hover-container">
                        <a href="{{ route('login') }}" class="header-tools__item">
                            <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <use href="#icon_user" />
                            </svg>
                        </a>
                    </div>
                @else
                    <div class="header-tools__item hover-container">
                        <a href="{{ Auth::user()->utype === 'ADM' ? route('admin.index') : route('user.index') }}"
                            class="header-tools__item">
                            <span class="pr-6px"> {{ Auth::user()->name }}</span>
                            <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <use href="#icon_user" />
                            </svg>
                        </a>
                    </div>

                @endguest


                <a href="{{ route('cart.index') }}" class="header-tools__item header-tools__cart">
                    <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <use href="#icon_cart" />
                    </svg>
                    @if (Cart::instance('cart')->content()->count() > 0)
                        <span class="cart-amount d-block position-absolute js-cart-items-count">
                            {{ Cart::instance('cart')->content()->count() }}
                        </span>
                    @endif
                </a>
    </div>

    <!-- Mobile Header -->
    <nav
        class="header-mobile__navigation navigation d-flex flex-column w-100 position-absolute top-100 bg-body overflow-auto">
        <div class="container">
            <form action="#" method="GET" class="search-field position-relative mt-4 mb-3">
                <div class="position-relative">
                    <input class="search-field__input w-100 border rounded-1" type="text" name="search-keyword"
                        placeholder="Search products" />
                    <button class="btn-icon search-popup__submit pb-0 me-2" type="submit">
                        <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <use href="#icon_search" />
                        </svg>
                    </button>
                    <button class="btn-icon btn-close-lg search-popup__reset pb-0 me-2" type="reset"></button>
                </div>

                <div class="position-absolute start-0 top-100 m-0 w-100">
                    <div class="search-result"></div>
                </div>
            </form>
        </div>

        <div class="container">
            <div class="overflow-hidden">
                <ul class="navigation__list list-unstyled position-relative">
                    <li class="navigation__item">
                        <a href="{{ url('/') }}" class="navigation__link">Home</a>
                    </li>
                    <li class="navigation__item">
                        <a href="{{ url('/about') }}" class="navigation__link">About Us</a>
                    </li>
                    <li class="navigation__item">
                        <a href="{{ url('/services') }}" class="navigation__link">Services</a>
                    </li>
                    <li class="navigation__item">
                        <a href="{{ route('shop.index') }}" class="navigation__link">Shop</a>
                    </li>
                    <li class="navigation__item">
                        <a href="{{ url('/contact-us') }}" class="navigation__link">Contact</a>
                    </li>
                    <li class="navigation__item">
                        <a href="{{ url('/quotation') }}" class="navigation__link btn btn-danger">Get Quotation</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="border-top mt-auto pb-2">
            <div class="customer-links container mt-4 mb-2 pb-1">
                <svg class="d-inline-block align-middle" width="20" height="20" viewBox="0 0 20 20"
                    fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_user" />
                </svg>
                <span class="d-inline-block ms-2 text-uppercase align-middle fw-medium">My Account</span>
            </div>

            <ul class="container social-links list-unstyled d-flex flex-wrap mb-0">
                <li>
                    <a href="#" class="footer__social-link d-block ps-0">
                        <svg class="svg-icon svg-icon_facebook" width="9" height="15" viewBox="0 0 9 15"
                            xmlns="http://www.w3.org/2000/svg">
                            <use href="#icon_facebook" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="#" class="footer__social-link d-block">
                        <svg class="svg-icon svg-icon_twitter" width="14" height="13" viewBox="0 0 14 13"
                            xmlns="http://www.w3.org/2000/svg">
                            <use href="#icon_twitter" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="#" class="footer__social-link d-block">
                        <svg class="svg-icon svg-icon_instagram" width="14" height="13" viewBox="0 0 14 13"
                            xmlns="http://www.w3.org/2000/svg">
                            <use href="#icon_instagram" />
                        </svg>
                    </a>
                </li>


            </ul>
        </div>
    </nav>
</div>

<!-- Desktop header  -->
<header id="header" class="header header-fullwidth header-transparent-bg">
    <div class="container">
        <div class="header-desk header-desk_type_1">
            <div class="logo">
                <a href="index.html">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Best for Creative logo"
                        class="logo__image d-block" />
                </a>
            </div>

            <nav class="navigation">
                <ul class="navigation__list list-unstyled d-flex">
                    <li class="navigation__item">
                        <a href="{{ url('/') }}" class="navigation__link">Home</a>
                    </li>
                    <li class="navigation__item">
                        <a href="{{ url('about') }}" class="navigation__link">About Us</a>
                    </li>
                    <li class="navigation__item">
                        <a href="{{ url('/services') }}" class="navigation__link">Services</a>
                    </li>
                    <li class="navigation__item">
                        <a href="{{ route('shop.index') }}" class="navigation__link">Shop</a>
                    </li>
                    <li class="navigation__item">
                        <a href="{{ url('/contact-us') }}" class="navigation__link">Contact</a>
                    </li>
                    <li class="navigation__item">
                        <a href="{{ url('/quotation') }}" class="navigation__link btn btn-danger">Get Quotation</a>
                    </li>
                </ul>
            </nav>

            <div class="header-tools d-flex align-items-center">
                <div class="header-tools__item hover-container">
                    <div class="js-hover__open position-relative">
                        <a class="js-search-popup search-field__actor" href="#">
                            <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <use href="#icon_search" />
                            </svg>
                            <i class="btn-icon btn-close-lg"></i>
                        </a>
                    </div>

                    <div class="search-popup js-hidden-content">
                        <form action="#" method="GET" class="search-field container">
                            <p class="text-uppercase text-secondary fw-medium mb-4">
                                What are you looking for?
                            </p>
                            <div class="position-relative">
                                <input class="search-field__input search-popup__input w-100 fw-medium" type="text"
                                    name="search-keyword" placeholder="Search products" />
                                <button class="btn-icon search-popup__submit" type="submit">
                                    <svg class="d-block" width="20" height="20" viewBox="0 0 20 20"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <use href="#icon_search" />
                                    </svg>
                                </button>
                                <button class="btn-icon btn-close-lg search-popup__reset" type="reset"></button>
                            </div>


                        </form>
                    </div>
                </div>

                @guest
                    <div class="header-tools__item hover-container">
                        <a href="{{ route('login') }}" class="header-tools__item">
                            <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <use href="#icon_user" />
                            </svg>
                        </a>
                    </div>
                @else
                    <div class="header-tools__item hover-container">
                        <a href="{{ Auth::user()->utype === 'ADM' ? route('admin.index') : route('user.index') }}"
                            class="header-tools__item">
                            <span class="pr-6px"> {{ Auth::user()->name }}</span>
                            <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <use href="#icon_user" />
                            </svg>
                        </a>
                    </div>

                @endguest


                <a href="{{ route('cart.index') }}" class="header-tools__item header-tools__cart">
                    <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <use href="#icon_cart" />
                    </svg>
                    @if (Cart::instance('cart')->content()->count() > 0)
                        <span class="cart-amount d-block position-absolute js-cart-items-count">
                            {{ Cart::instance('cart')->content()->count() }}
                        </span>
                    @endif
                </a>
            </div>
        </div>
    </div>
</header>
