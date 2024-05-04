@extends('layout.website')

@section('content')
    <!-- cart -->
    <div class="cart-section  mb-150 pt-150">
        <div class="container">
            <h3 class="mb-5">YOUR CART</h3>
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="cart-table-wrap">
                        <table class="cart-table">
                            <thead class="cart-table-head">
                                <tr class="table-head-row">
                                    <th class="product-remove"></th>
                                    <th class="product-image">Product Image</th>
                                    <th class="product-name">Name</th>
                                    <th class="product-price">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $item)
                                    <tr class="table-body-row">
                                        <td class="product-remove"><a href="#"><i class="far fa-window-close"></i></a>
                                        </td>
                                        <td class="product-image"><img src="{{ asset($item->main_image) }}" alt="">
                                        </td>
                                        <td class="product-name">{{ $item->name }}</td>
                                        <td class="product-price">${{ $item->price }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="total-section">
                        <table class="total-table">
                            <thead class="total-table-head">
                                <tr class="table-total-row">
                                    <th>Total</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="total-data">
                                    <td><strong>Total: </strong></td>
                                    <td>$68</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="cart-buttons">
                            <a href="checkout.html" class="boxed-btn black">Check Out</a>
                        </div>
                    </div>

                </div>

                <div class="container payment-details mt-5">
                    <h3 class="head p-4 text-white">Payment Options</h3>
                    <div class="btn-group" role="group" aria-label="Payment Methods">
                        <button type="button" class="btn btn-primary" id="credit">Credit</button>
                    </div>
                    <div class="btn-group" role="group" aria-label="Payment Methods">
                        <button type="button" class="btn btn-primary" id="paypal">PayPal</button>
                    </div>
                    <div class="btn-group" role="group" aria-label="Payment Methods">
                        <button type="button" class="btn btn-primary" id="cash">Cash on Delivery</button>
                    </div>

                    <div id="credit-info" class="mt-3" style="display:none;">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Payment Information</h5>
                                <p class="card-text">Enter your credit card details below.</p>
                                <form>
                                    <div class="mb-3">
                                        <label for="cardNumber" class="form-label">Card Number</label>
                                        <input type="text" class="form-control" id="cardNumber"
                                            placeholder="1234 5678 9012 3456">
                                    </div>
                                    <div class="mb-3">
                                        <label for="cardExpiration" class="form-label">Expiration Date</label>
                                        <input type="text" class="form-control" id="cardExpiration" placeholder="MM/YY">
                                    </div>
                                    <div class="mb-3">
                                        <label for="cardCVC" class="form-label">CVC</label>
                                        <input type="text" class="form-control" id="cardCVC" placeholder="CVC">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>

                    </div>

                    <div id="paypal-info" class="mt-3" style="display:none;">
                        <div class="card my-5">
                            <div class="card-body">
                                <h5 class="card-title">PayPal Login</h5>
                                <p class="card-text">Login to your PayPal account to proceed.</p>
                                <form>
                                    <div class="mb-3">
                                        <label for="paypalEmail" class="form-label">Email address</label>
                                        <input type="email" class="form-control" id="paypalEmail"
                                            aria-describedby="emailHelp" placeholder="Enter email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="paypalPassword" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="paypalPassword"
                                            placeholder="Password">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Log In</button>
                                </form>
                            </div>
                        </div>

                    </div>

                    <div id="cash-info" class="mt-3" style="display:none;">
                        <div class="card mx-auto my-4" style="max-width: 500px;">
                            <div class="card-body">
                                <h5 class="card-title">Payment Information</h5>
                                <p class="card-text">Payment will be made upon delivery.</p>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <!-- end cart -->

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
    <style>
        .payment-details .head {
            background-color: #051922;
            border-radius: 10px;

        }
    </style>
