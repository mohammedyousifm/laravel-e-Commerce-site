@extends('layout.website')

@section('content')
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>See more Details</p>
                        <h1>Single Product</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-section mt-150 mb-150">



        <div class="single-product mt-150 mb-150">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="single-product-img">
                            <img id="main-image" src="{{ URL($prod->main_image) }}" alt="img">
                            <img id="additional-image" src="{{ URL($prod->additional_image) }}" alt="img">
                            <div id="image-controls">
                                <span id="prev-image">&#10094;</span>
                                <span id="next-image">&#10095;</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="single-product-content">
                            <h3>{{ $prod->name }}</h3>
                            <div class="poll">
                                3.5 <i class="fa-solid fa-star"></i> <a href="">(51 Ratings & 24 Reviews)</a>
                            </div>
                            <p class="single-product-pricing">${{ $prod->price }}</p>
                            <p>{{ $prod->description }}</p>
                            <div class="single-product-form">

                                <a href="{{ route('buy_now.cart', $prod->id) }}" class="cart-btn">Buy Now</a>
                                <a href="{{ route('add_item.cart', $prod->id) }}" class="cart-btn"><i
                                        class="fas fa-shopping-cart"></i>Add to Cart </a>

                                <p><strong>Categories: </strong>Fruits, Organic</p>
                            </div>
                            <h4>Share:</h4>
                            <ul class="product-share">
                                <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href=""><i class="fab fa-twitter"></i></a></li>
                                <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                                <li><a href=""><i class="fab fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style>
            #image-controls {
                position: absolute;
                top: 50%;
                left: -5px;
                transform: translateY(-50%);
                width: 100%;
                display: flex;
                justify-content: space-between;
            }

            #prev-image,
            #next-image {
                cursor: pointer;
                font-size: 24px;
                color: #333;
                padding: 5px 10px;
                background-color: #fff;
            }

            #prev-image:hover,
            #next-image:hover {
                background-color: rgba(255, 255, 255, 0.9);
            }
        </style>

        <!-- more products -->
        <div class="more-products mb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="section-title">
                            <h3><span class="orange-text">Related</span> Products</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet
                                beatae optio.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($related_products as $item)
                        <div class="col-lg-4 col-md-6 text-center">
                            <div class="single-product-item">
                                <div class="product-image">
                                    <a href="single-product.html"><img src="{{ URL($prod->main_image) }}"
                                            alt="img"></a>
                                </div>
                                <h3>{{ $item->name }}</h3>
                                <div class="poll">
                                    3.5 <i class="fa-solid fa-star"></i> <a href="">(51 Ratings & 24 Reviews)</a>
                                </div>
                                <p class="product-price">${{ $item->price }} </p>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>

    </div>
@endsection
