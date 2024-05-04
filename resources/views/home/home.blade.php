@extends('layout.website')

@section('content')
    <!-- home page slider -->
    <div class="homepage-slider">
        <!-- single home slider -->
        <div class="single-homepage-slider homepage-bg-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
                        <div class="hero-text">
                            <div class="hero-text-tablecell">
                                <p class="subtitle">"Seal Tech Store"</p>
                                <h1>Find your perfect phone fit</h1>
                                <div class="hero-btns">
                                    <a href="{{ route('total.products') }}" class="boxed-btn">Products</a>
                                    <a href="{{ route('contact.index') }}" class="bordered-btn">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single home slider -->
        <div class="single-homepage-slider homepage-bg-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 text-center">
                        <div class="hero-text">
                            <div class="hero-text-tablecell">
                                <p class="subtitle">"Seal Tech Store"</p>
                                <h1>Whether it's for work or play, we've got the phone that fits.</h1>
                                <div class="hero-btns">
                                    <a href="{{ route('total.products') }}" class="boxed-btn">Visit Products</a>
                                    <a href="{{ route('contact.index') }}" class="bordered-btn">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single home slider -->
        <div class="single-homepage-slider homepage-bg-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 text-right">
                        <div class="hero-text">
                            <div class="hero-text-tablecell">
                                <p class="subtitle">Mega Sale Going On!</p>
                                <h1>Explore our vast selection of phones</h1>
                                <div class="hero-btns">
                                    <a href="{{ route('total.products') }}" class="boxed-btn">Visit Products</a>
                                    <a href="{{ route('contact.index') }}" class="bordered-btn">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end home page slider -->
    <!-- product section -->
    <div class="product-section mt-150 mb-150" id="product">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Our</span> Products</h3>
                        <p>From cutting-edge <span class="orange-text">iPhones</span> to versatile <span
                                class="orange-text">Androids</span> and reliable <span class="orange-text">feature
                                phones</span>, we have the perfect
                            device to suit every preference and lifestyle.</p>
                    </div>
                </div>
            </div>

            <div class="row">

                @foreach ($products as $item)
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="{{ route('single.product', $item->id) }}"><img class="prod-img"
                                        src="{{ URL($item->image) }}" alt=""></a>
                            </div>
                            <h3>{{ $item->name }}</h3>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </div>

    <style>
        .top-header-area {
            background-color: transparent;
        }

        .prod-img {
            min-width: 100px;
            max-width: 100px;

            min-height: 100px;
            max-height: 100px;
        }
    </style>

    <!-- testimonail-section -->
    <div class="testimonail-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 text-center">
                    <div class="testimonial-sliders">
                        <div class="single-testimonial-slider">
                            <div class="client-meta">
                                <h3>Saira Hakim <span>Local shop owner</span></h3>
                                <p class="testimonial-body">
                                    " Sed ut perspiciatis unde omnis iste natus error veritatis et quasi architecto beatae
                                    vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis iste natus
                                    error sit voluptatem accusantium "
                                </p>
                                <div class="last-icon">
                                    <i class="fas fa-quote-right"></i>
                                </div>
                            </div>
                        </div>
                        <div class="single-testimonial-slider">
                            <div class="client-meta">
                                <h3>David Niph <span>Local shop owner</span></h3>
                                <p class="testimonial-body">
                                    " Sed ut perspiciatis unde omnis iste natus error veritatis et quasi architecto beatae
                                    vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis iste natus
                                    error sit voluptatem accusantium "
                                </p>
                                <div class="last-icon">
                                    <i class="fas fa-quote-right"></i>
                                </div>
                            </div>
                        </div>
                        <div class="single-testimonial-slider">
                            <div class="client-meta">
                                <h3>Jacob Sikim <span>Local shop owner</span></h3>
                                <p class="testimonial-body">
                                    " Sed ut perspiciatis unde omnis iste natus error veritatis et quasi architecto beatae
                                    vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis iste natus
                                    error sit voluptatem accusantium "
                                </p>
                                <div class="last-icon">
                                    <i class="fas fa-quote-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end testimonail-section -->

    <!-- advertisement section -->
    <div class="abt-section mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="abt-bg">
                        <a href="https://www.youtube.com/watch?v=DBLlFWYcIGQ" class="video-play-btn popup-youtube"><i
                                class="fas fa-play"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="abt-text">
                        <p class="top-sub">Since Year 1999</p>
                        <h2>We are <span class="orange-text">Fruitkha</span></h2>
                        <p>Etiam vulputate ut augue vel sodales. In sollicitudin neque et massa porttitor vestibulum ac vel
                            nisi. Vestibulum placerat eget dolor sit amet posuere. In ut dolor aliquet, aliquet sapien sed,
                            interdum velit. Nam eu molestie lorem.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente facilis illo repellat
                            veritatis minus, et labore minima mollitia qui ducimus.</p>
                        <a href="about.html" class="boxed-btn mt-4">know more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end advertisement section -->

    <!-- logo carousel -->
    <div class="logo-carousel-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="logo-carousel-inner">
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/1.png" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/2.png" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/3.png" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/4.png" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/5.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end logo carousel -->
@endsection
