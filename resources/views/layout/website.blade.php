<!DOCTYPE html>
<html lang="en">

<head>
    {{-- meta  --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta property="og:site_name" content="Seal Tech Store" /> <!-- website name -->
    <title>@yield('title', 'Home Page')</title>

    {{-- logo --}}
    <link rel="icon" href="{{ asset('assets/img/log.png') }}">

    {{-- bootstrap --}}
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap-grid.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap-grid.css.map') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap-grid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap-grid.min.css.map') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap-reboot.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap-reboot.css.map') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap-reboot.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap-reboot.min.css.map') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.css.map') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css.map') }}">
    {{-- templeat --}}
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

</head>

<body>

    <!--PreLoader-->
    {{-- <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div> --}}
    <!--PreLoader Ends-->

    <!-- header -->
    <div class="top-header-area p-1 pt-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center">
                    <div class="main-menu-wrap">
                        <!-- logo -->
                        <div class="site-logo">
                            <a href="/">
                                <img style="border-radius: 10px; width: 90px" src="{{ asset('assets/img/log.png') }}"
                                    alt="">
                            </a>
                        </div>
                        <!-- logo -->

                        <!-- menu start -->
                        <nav class="main-menu">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><a href="{{ route('about.index') }}">About us</a></li>
                                <li><a href="{{ route('total.products') }}">Products</a></li>

                                <li><a href="{{ route('contact.index') }}">Contact Us</a></li>
                                <li>
                                    <div class="header-icons">
                                        @auth
                                            <a href="{{ route('login.index') }}"></a>
                                        @else
                                            <a href="{{ route('login.index') }}">Login/Sign up</a>
                                        @endauth

                                        <div class="dropdown">
                                            <a class="shopping-cart"
                                                href="@auth {{ route('user.account', Auth::user()->name) }} @else {{ route('login.DB') }} @endauth">
                                                <i class="fas fa-user"></i></a>
                                            <div class="dropdown-content ">
                                                <i class="fas fa-user"></i><a
                                                    href="@auth {{ route('user.account', Auth::user()->name) }} @else {{ route('login.DB') }} @endauth">My
                                                    Account</a><br>
                                                <i class="fas fa-shopping-cart"></i><a
                                                    href="{{ route('cart.user') }}">MY
                                                    Order</a><br>
                                                <i class="fas fa-user"></i><a
                                                    href="{{ route('sign.out') }}">SignOut</a>
                                            </div>
                                        </div>

                                        <a class="shopping-cart" href="{{ route('cart.user') }}"><span
                                                class="total-order">10</span><i class="fas fa-shopping-cart"></i></a>
                                        <a class="mobile-hide search-bar-icon" href="#"><i
                                                class="fas fa-search"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                        <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                        <div class="mobile-menu"></div>
                        <!-- menu end -->
                    </div>
                </div>
            </div>
        </div>
    </div>


    <style>
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            border-radius: 5px;
            min-width: 130px;
            z-index: 1;
        }

        .dropdown-content a {
            color: rgb(0, 0, 0) !important;
            font-size: 10px;
            padding: 5px;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .shopping-cart {
            position: relative;
        }

        .total-order {
            position: absolute;
            top: 0px;
            right: 0px;
            background-color: rgb(0, 0, 0);
            padding: 4px;
            border-radius: 15px;
            font-size: 7px;
        }
    </style>
    <!-- search area -->
    <div class="search-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="close-btn"><i class="fas fa-window-close"></i></span>
                    <div class="search-bar">
                        <div class="search-bar-tablecell">
                            <h3>Search For:</h3>
                            <input type="text" placeholder="Keywords">
                            <button type="submit">Search <i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @yield('content')


    <!-- footer -->
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box about-widget">
                        <h2 class="widget-title">About us</h2>
                        <p>Ut enim ad minim veniam perspiciatis unde omnis iste natus error sit voluptatem accusantium
                            doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box get-in-touch">
                        <h2 class="widget-title">Get in Touch</h2>
                        <ul>
                            <li>34/8, East Hukupara, Gifirtok, Sadan.</li>
                            <li>support@fruitkha.com</li>
                            <li>+00 111 222 3333</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box pages">
                        <h2 class="widget-title">Pages</h2>
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><a href="{{ route('about.index') }}">About</a></li>
                            <li><a href="{{ route('total.products') }}">Product</a></li>
                            <li><a href="{{ route('contact.index') }}">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box subscribe">
                        <h2 class="widget-title">Subscribe</h2>
                        <p>Subscribe to our mailing list to get the latest updates.</p>
                        <form action="index.html">
                            <input type="email" placeholder="Email">
                            <button type="submit"><i class="fas fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <p>Copyrights &copy; 2019 - <a href="https://imransdesign.com/">Imran Hossain</a>, All Rights
                        Reserved.<br>
                        Distributed By - <a href="https://themewagon.com/">Themewagon</a>
                    </p>
                </div>
                <div class="col-lg-6 text-right col-md-12">
                    <div class="social-icons">
                        <ul>
                            <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end copyright -->


    {{-- bootstrap --}}
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.js.map') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js.map') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.js.map') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js.map') }}"></script>

    {{-- bootstrap --}}
    <script src="{{ asset('assets/js/jquery-1.11.3.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.countdown.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.isotope-3.0.6.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.meanmenu.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/sticker.js') }}"></script>
    <script src="{{ asset('assets/js/waypoints.js') }}"></script>

    {{-- my script --}}
    <script src="{{ asset('assets/website/js/website.js') }}"></script>


</body>

</html>
