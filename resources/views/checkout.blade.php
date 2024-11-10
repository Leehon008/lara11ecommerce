@extends('layouts.app')
@section('content')
    <main class="pt-90">
        <div class="mb-4 pb-4"></div>
        <section class="shop-checkout container">
            <h2 class="page-title">Shipping and Checkout</h2>
            <div class="checkout-steps">
                <a href="{{ route('cart.index') }}" class="checkout-steps__item active">
                    <span class="checkout-steps__item-number">01</span>
                    <span class="checkout-steps__item-title">
                        <span>Shopping Bag</span>
                        <em>Manage Your Items List</em>
                    </span>
                </a>
                <a href="checkout.html" class="checkout-steps__item active">
                    <span class="checkout-steps__item-number">02</span>
                    <span class="checkout-steps__item-title">
                        <span>Shipping and Checkout</span>
                        <em>Checkout Your Items List</em>
                    </span>
                </a>
                <a href="order-confirmation.html" class="checkout-steps__item">
                    <span class="checkout-steps__item-number">03</span>
                    <span class="checkout-steps__item-title">
                        <span>Confirmation</span>
                        <em>Review And Submit Your Order</em>
                    </span>
                </a>
            </div>

            <form name="checkout-form" action="{{ route('cart.process_payment') }}" method="POST">
                <div class="checkout-form">
                    <div class="billing-info__wrapper">
                        <div class="row">
                            <div class="col-6">
                                <h4>SHIPPING DETAILS</h4>
                            </div>
                            <div class="col-6">
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-md-4">
                                <div class="form-floating my-3">
                                    <input type="text" class="form-control" name="name" required=""
                                        value="{{ Auth::user()->name }} &nbsp; {{ Auth::user()->surname }}">
                                    <label for="name">Full Name *</label>
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating my-3">
                                    <input type="text" class="form-control" name="phone" required=""
                                        value="{{ Auth::user()->mobile }}">
                                    <label for="phone">Phone Number *</label>
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating my-3">
                                    <input type="text" class="form-control" name="city" required="">
                                    <label for="city">Town / City *</label>
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating my-3">
                                    <input type="text" class="form-control" name="address" required=""
                                        value="{{ Auth::user()->address }}">
                                    <label for="address">House no, Building Name *</label>
                                    <span class="text-danger"></span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="checkout__totals-wrapper">
                        <div class="sticky-content">
                            <div class="checkout__totals">
                                <h3>Your Order</h3>
                                @if ($items->count() > 0)
                                    <table class="checkout-cart-items">
                                        <thead>
                                            <tr>
                                                <th>PRODUCT</th>
                                                <th align="right">SUBTOTAL</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($items as $item)
                                                <tr>
                                                    <td>
                                                        {{ $item->name }}
                                                    </td>
                                                    <td align="right">
                                                        {{ $item->subTotal() }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <table class="checkout-totals">
                                        <tbody>
                                            <tr>
                                                <th>Subtotal</th>
                                                <td>${{ Cart::instance('cart')->subTotal() }}</td>
                                            </tr>
                                            <tr>
                                                <th>Shipping</th>
                                                <td> Free </td>
                                            </tr>
                                            <tr>
                                                <th>VAT</th>
                                                <td>${{ Cart::instance('cart')->tax() }}</td>
                                            </tr>
                                            <tr>
                                                <th>Total</th>
                                                <td>${{ Cart::instance('cart')->total() }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                @else
                                    <div class="row">
                                        <div class="col-md-12 text-center pt-2 tp-2">
                                            <p>No Items Found in your Cart</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="checkout__payment-methods">

                                @if ($items->count() > 0)
                                    <div class="form-check">
                                        <input class="form-check-input form-check-input_fill" type="radio"
                                            name="checkout_payment_method" id="checkout_payment_method_1" checked>
                                        <label class="form-check-label" for="checkout_payment_method_1">
                                            PayNow
                                            <p class="option-detail">
                                                Use Paynow to process payments
                                            </p>
                                        </label>
                                    </div>
                                    <div class="policy-text">
                                        Your personal data will be used to process your order, support your experience
                                        throughout this
                                        website, and for other purposes described in our <a
                                            href="{{ route('shop.terms') }}" target="_blank">privacy
                                            policy</a>.
                                    </div>
                            </div>
                            <button class="btn btn-primary btn-checkout">PLACE ORDER</button>
                        @else
                            <div class="row">
                                <div class="col-md-12 text-center pt-2 tp-2">
                                    <a href="{{ route('shop.index') }}" class="btn btn-info">Shop Now</a>
                                </div>
                            </div>
                            @endif

                        </div>
                    </div>
                </div>
            </form>
        </section>
    </main>
@endsection
