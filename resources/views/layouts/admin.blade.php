<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Best for Creative') }}</title>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="Codewand Technologies" />
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('font/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('icon/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('assets/images/favicon.ico') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
    @stack('styles');
</head>


<body class="body">
    <div id="wrapper">
        <div id="page" class="">
            <div class="layout-wrap">

                <div id="preload" class="preload-container">
                    <div class="preloading">
                        <span></span>
                    </div>
                </div>

                <div class="section-menu-left">
                    <div class="box-logo">
                        <a href="{{ route('admin.index') }}" id="site-logo-inner">
                            <img class="" id="logo_header1" alt="" src="{{ asset('assets/images/logo.png') }}" data-light="{{ asset('assets/images/logo.png') }}" data-dark="{{ asset('assets/images/logo.png') }}">
                        </a>
                        <div class="button-show-hide">
                            <i class="icon-menu-left"></i>
                        </div>
                    </div>
                    <div class="center">
                        <div class="center-item">
                            <div class="center-heading">Main Home</div>
                            <ul class="menu-list">
                                <li class="menu-item">
                                    <a href="{{ route('admin.index') }}" class="">
                                        <div class="icon"><i class="icon-grid"></i></div>
                                        <div class="text">Dashboard</div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="center-item">
                            <ul class="menu-list">
                                <li class="menu-item has-children">
                                    <a href="javascript:void(0);" class="menu-item-button">
                                        <div class="icon"><i class="icon-layers"></i></div>
                                        <div class="text">Category</div>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="sub-menu-item">
                                            <a href="{{ route('admin.category_add') }}" class="">
                                                <div class="text">New Category</div>
                                            </a>
                                        </li>
                                        <li class="sub-menu-item">
                                            <a href="{{ route('admin.categories') }}" class="">
                                                <div class="text">Categories</div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item has-children">
                                    <a href="javascript:void(0);" class="menu-item-button">
                                        <div class="icon"><i class="icon-layers"></i></div>
                                        <div class="text">Designs</div>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="sub-menu-item">
                                            <a href="{{ route('admin.brand_add') }}" class="">
                                                <div class="text">New Design</div>
                                            </a>
                                        </li>
                                        <li class="sub-menu-item">
                                            <a href="{{ route('admin.brands') }}" class="">
                                                <div class="text">Designs</div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item has-children">
                                    <a href="javascript:void(0);" class="menu-item-button">
                                        <div class="icon"><i class="icon-shopping-cart"></i></div>
                                        <div class="text">Products</div>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="sub-menu-item">
                                            <a href="{{ route('admin.product_add') }}" class="">
                                                <div class="text">Add Product</div>
                                            </a>
                                        </li>
                                        <li class="sub-menu-item">
                                            <a href="{{ route('admin.products') }}" class="">
                                                <div class="text">Products</div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>



                                <li class="menu-item has-children">
                                    <a href="javascript:void(0);" class="menu-item-button">
                                        <div class="icon"><i class="icon-file-plus"></i></div>
                                        <div class="text">Order</div>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="sub-menu-item">
                                            <a href="orders.html" class="">
                                                <div class="text">Orders</div>
                                            </a>
                                        </li>
                                        <li class="sub-menu-item">
                                            <a href="order-tracking.html" class="">
                                                <div class="text">Order tracking</div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('admin.promotion') }}" class="">
                                        <div class="icon"><i class="icon-image"></i></div>
                                        <div class="text">Promotions</div>
                                    </a>
                                </li>
                                <!-- <li class="menu-item">
                                    <a href="coupons.html" class="">
                                        <div class="icon"><i class="icon-grid"></i></div>
                                        <div class="text">Coupons</div>
                                    </a>
                                </li> -->

                                <li class="menu-item">
                                    <a href="{{ route('admin.users') }}" class="">
                                        <div class="icon"><i class="icon-user"></i></div>
                                        <div class="text">Users | Accounts</div>
                                    </a>
                                </li>

                                <li class="menu-item">
                                    <a href="{{ route('admin.quotations') }}" class="">
                                        <div class="icon"><i class="icon-layers"></i></div>
                                        <div class="text">Quotations Pricing</div>
                                    </a>
                                </li>

                                <li class="menu-item">
                                    <form action="{{ route('logout') }}" id="logout-form" method="post">
                                        @csrf
                                    </form>
                                    <a href="{{ route('logout') }}" class="" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <div class="icon"><i class="icon-settings"></i></div>
                                        <div class="text">Logout</div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="section-content-right">

                    <div class="header-dashboard">
                        <div class="wrap">
                            <div class="header-left">
                                <a href="index-2.html">
                                    <img class="" id="logo_header_mobile" alt="" src="{{ asset('assets/images/logo.png') }}" data-light="assets/images/logo.png" data-dark="{{ asset('assets/images/logo.png') }}" data-width="154px" data-height="52px" data-retina="{{ asset('assets/images/logo.png') }}">
                                </a>
                                <div class="button-show-hide">
                                    <i class="icon-menu-left"></i>
                                </div>

                            </div>
                            <div class="header-grid">


                                <div class="popup-wrap user type-header">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="header-user wg-user">
                                                <span class="image">
                                                    <img src="{{ asset('assets/images/favicon.ico') }}" alt="Admin">
                                                </span>
                                                <span class="flex flex-column">
                                                    <!-- <span class="body-title mb-2">{{ Auth::user()->name }}</span> -->
                                                    <span class="text-tiny">Admin</span>
                                                </span>
                                            </span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end has-content" aria-labelledby="dropdownMenuButton3">
                                            <li>
                                                <form action="{{ route('logout') }}" method="post" id="logout-form">
                                                    @csrf
                                                    <a href="{{ route('logout') }}" class="user-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                        <div class="icon">
                                                            <i class="icon-log-out"></i>
                                                        </div>
                                                        <div class="body-title-2">Log out</div>
                                                </form>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="main-content">
                        @yield('content')

                        <div class="bottom-page">
                            <div class="body-text" style="padding-top:2rem">
                                Copyright © <span id="year"></span> Codewand Technologies
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    {{-- <script>
        function updatePricePerM2() {
            // Get the selected brand option
            const selectedBrand = document.getElementById('brand').selectedOptions[0];
        
            // Get the price_per_m2 data attribute from the selected option
            let pricePerM2 = selectedBrand.getAttribute('data-price');
        
            // Round the price per m² to 2 decimal places
            pricePerM2 = parseFloat(pricePerM2).toFixed(2);
        
            // Set the value of the price_per_m2 input field
            document.getElementById('price_per_m2').value = pricePerM2;
        }
        </script>
         --}}
    <script>
        function updatePrice() {
            // Get the selected brand option
            const selectedBrand = document.getElementById('brand').selectedOptions[0];

            // Get the price_per_m2 data attribute from the selected option
            const price = selectedBrand.getAttribute('data-price');

            // Set the value of the price_per_m2 input field
            document.getElementById('price').value = price;
        }

    </script>
    <script>
        (function($) {

            var tfLineChart = (function() {

                var chartBar = function() {

                    var options = {
                        series: [{
                                name: 'Total'
                                , data: [0.00, 0.00, 0.00, 0.00, 0.00, 273.22, 208.12, 0.00, 0.00
                                    , 0.00, 0.00, 0.00
                                ]
                            }, {
                                name: 'Pending'
                                , data: [0.00, 0.00, 0.00, 0.00, 0.00, 273.22, 208.12, 0.00, 0.00
                                    , 0.00, 0.00, 0.00
                                ]
                            }
                            , {
                                name: 'Delivered'
                                , data: [0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00
                                    , 0.00, 0.00
                                ]
                            }, {
                                name: 'Canceled'
                                , data: [0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00
                                    , 0.00, 0.00
                                ]
                            }
                        ]
                        , chart: {
                            type: 'bar'
                            , height: 325
                            , toolbar: {
                                show: false
                            , }
                        , }
                        , plotOptions: {
                            bar: {
                                horizontal: false
                                , columnWidth: '10px'
                                , endingShape: 'rounded'
                            }
                        , }
                        , dataLabels: {
                            enabled: false
                        }
                        , legend: {
                            show: false
                        , }
                        , colors: ['#2377FC', '#FFA500', '#078407', '#FF0000']
                        , stroke: {
                            show: false
                        , }
                        , xaxis: {
                            labels: {
                                style: {
                                    colors: '#212529'
                                , }
                            , }
                            , categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'
                                , 'Oct', 'Nov', 'Dec'
                            ]
                        , }
                        , yaxis: {
                            show: false
                        , }
                        , fill: {
                            opacity: 1
                        }
                        , tooltip: {
                            y: {
                                formatter: function(val) {
                                    return "$ " + val + ""
                                }
                            }
                        }
                    };

                    chart = new ApexCharts(
                        document.querySelector("#line-chart-8")
                        , options
                    );
                    if ($("#line-chart-8").length > 0) {
                        chart.render();
                    }
                };

                /* Function ============ */
                return {
                    init: function() {},

                    load: function() {
                        chartBar();
                    }
                    , resize: function() {}
                , };
            })();

            jQuery(document).ready(function() {});

            jQuery(window).on("load", function() {
                tfLineChart.load();
            });

            jQuery(window).on("resize", function() {});
        })(jQuery);

    </script>
    <script>
        document.getElementById('year').textContent = new Date().getFullYear();

    </script>

    @stack('scripts')
</body>

</html>
