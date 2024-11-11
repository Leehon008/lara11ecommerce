@extends('layouts.app')
@section('content')
    <main class="pt-90">
        @if ($order)
            <div class="mb-4 pb-4"></div>
            <section class="shop-checkout container">
                <div class="order-complete">
                    <button class="btn btn-secondary" onclick="window.history.back()">Back to more Orders</button>
                    <div class="order-complete__message">
                        <svg width="80" height="80" viewBox="0 0 80 80" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="40" cy="40" r="40" fill="#B9A16B" />
                            <path
                                d="M52.9743 35.7612C52.9743 35.3426 52.8069 34.9241 52.5056 34.6228L50.2288 32.346C49.9275 32.0446 49.5089 31.8772 49.0904 31.8772C48.6719 31.8772 48.2533 32.0446 47.952 32.346L36.9699 43.3449L32.048 38.4062C31.7467 38.1049 31.3281 37.9375 30.9096 37.9375C30.4911 37.9375 30.0725 38.1049 29.7712 38.4062L27.4944 40.683C27.1931 40.9844 27.0257 41.4029 27.0257 41.8214C27.0257 42.24 27.1931 42.6585 27.4944 42.9598L33.5547 49.0201L35.8315 51.2969C36.1328 51.5982 36.5513 51.7656 36.9699 51.7656C37.3884 51.7656 37.8069 51.5982 38.1083 51.2969L40.385 49.0201L52.5056 36.8996C52.8069 36.5982 52.9743 36.1797 52.9743 35.7612Z"
                                fill="white" />
                        </svg>
                        <h3> Order {{ $order->id }} Details </h3>
                        <p>Thank you. Your order has been retrieved.</p>
                    </div>
                    <div class="order-info">
                        <div class="order-info__item">
                            <label>Order Number</label>
                            <span>{{ $order->id }}</span>
                        </div>
                        <div class="order-info__item">
                            <label>Paynow Reference</label>
                            <span>{{ $order->paynowreference }}</span>
                        </div>
                        <div class="order-info__item">
                            <label>Order Creation Date</label>
                            <span>{{ $order->created_at->format('d M, Y h:i A') }}</span>
                        </div>
                        <div class="order-info__item">
                            <label>Total</label>
                            <span>${{ $order->amount }}</span>
                        </div>
                        <div class="order-info__item">
                            <label>Payment Method</label>
                            <span>{{ $order->payment_method }}</span>
                        </div>
                    </div>
                    <div class="checkout__totals-wrapper">
                        <div class="checkout__totals">

                            <h3>Order Details</h3>
                            <p>Payment Poll URL: <a style="font-style: italic;color:rgb(35, 149, 39)"
                                    href="{{ $order->pollurl }}" target="_blank">{{ $order->pollurl }}</a>
                            </p>
                            @php
                                $cartItems = json_decode($order->cart_items, true);
                            @endphp

                            @if (is_array($cartItems) && count($cartItems) > 0)
                                <table class="checkout-cart-items">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cartItems as $item)
                                            <tr>
                                                <td>{{ $item['name'] }}</td>
                                                <td>{{ $item['qty'] }}</td>
                                                <td>${{ $item['price'] }}</td>
                                                <td align="right">${{ $item['subtotal'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p>No cart items available.</p>
                            @endif
                            <table class="checkout-totals">
                                <tbody>
                                    <tr align="right">
                                        <th>SUBTOTAL</th>
                                        <td>{{ $order->subTotal }}</td>
                                    </tr>
                                    <tr align="right">
                                        <th>SHIPPING</th>
                                        <td>Free shipping</td>
                                    </tr>
                                    <tr align="right">
                                        <th>VAT</th>
                                        <td>{{ $order->tax }}</td>
                                    </tr>
                                    <tr align="right">
                                        <th>TOTAL</th>
                                        <td>${{ $order->amount }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    </main>
@endsection
