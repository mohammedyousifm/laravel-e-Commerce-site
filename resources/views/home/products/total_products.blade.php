@extends('layout.website')

@section('content')
    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>We sale good Products</p>
                        <h1>Our Products</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <div class="product-section single-prod mt-150 mb-150">
        <div class="container">

            <div class="row">

                @foreach ($all_products as $item)
                    <div class="col-lg-4 col-md-6">
                        <a href="{{ route('show.single', $item->id) }}">
                            <div class="single-product-item text-center">
                                <div class="product-image  text-center">
                                    <img class="single_img " src="{{ URL($item->main_image) }}" alt="img">
                                    <style>
                                        .single_img {
                                            max-width: 150px !important;
                                            min-width: 150px !important;
                                            max-height: 150px !important;
                                            min-height: 180px !important;
                                        }
                                    </style>
                                </div>
                                <div class="info">
                                    <p class="product-name">{{ $item->name }}</p>
                                    <p class="product-price ">${{ $item->price }} <del>$667</del> <span
                                            class="save">(save
                                            $10)</span></p>
                                    <p class="product-delivery"><i class="fa-solid fa-truck"></i> Standard Delivery by
                                        Tomorrow
                                    </p>
                                </div>
                                {{-- <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a> --}}
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection

<style>
    .single-prod .product-price,
    .product-delivery,
    .product-name {
        font-size: 20px;
    }

    .single-prod .product-delivery {
        position: absolute;

        padding: 5px;
        bottom: 35px;
    }


    .single-prod .info {
        padding: 10px;
    }


    .single-prod del {
        color: red;
        margin-left: 15px;
        font-size: 15px;
    }
</style>
