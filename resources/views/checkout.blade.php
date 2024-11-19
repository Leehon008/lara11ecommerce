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
                        <span>Cart</span>
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

            <form method="POST" class="form-new-product form-style-1" action="{{ route('paynow') }}" id="checkoutForm">
                @csrf
                <div class="checkout-form">
                    <div class="billing-info__wrapper">
                        <div class="row">
                            <div class="col-6">
                                <h4>SHIPPING DETAILS</h4>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-4">
                                <div class="form-floating my-3">
                                    <input type="text" class="form-control" name="name" required=""
                                        value="{{ Auth::user()->name }} {{ Auth::user()->surname }}" readonly>
                                    <label for="name">Full Name *</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating my-3">
                                    <input type="text" class="form-control" name="phone" required=""
                                        value="{{ Auth::user()->mobile }}" readonly>
                                    <label for="phone">Phone Number *</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating my-3">
                                    <input type="email" id="email" class="form-control" name="email"
                                        value="{{ Auth::user()->email }}" readonly>
                                    <label for="email">Email Address *</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating my-3">
                                    <input type="text" class="form-control" name="city" value="Harare" required>
                                    <label for="city">Town / City *</label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-floating my-3">
                                    <input type="text" class="form-control" name="address" required=""
                                        value="{{ Auth::user()->address }}">
                                    <label for="address">Address *</label>
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
                                                    <td>{{ $item->name }}</td>
                                                    <td align="right">{{ $item->subTotal() }}</td>
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
                                        <div class="col-md-12 text-center pt-2">
                                            <p>No Items Found in your Cart</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="checkout__payment-methods">
                                @if ($items->count() > 0)
                                    <div class="form-check">
                                        <input class="form-check-input form-check-input_fill" type="radio"
                                            name="checkout_payment_method" id="checkout_payment_method_1" value="pay_online"
                                            checked>
                                        <label class="form-check-label" for="checkout_payment_method_1">
                                            Pay Online
                                            <p class="option-detail">Use Paynow to process payments</p>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input form-check-input_fill" type="radio"
                                            name="checkout_payment_method" id="pay_on_delivery" value="pay_on_delivery">
                                        <label class="form-check-label" for="pay_on_delivery">
                                            Pay On Delivery
                                        </label>
                                    </div>
                                    <div class="policy-text">
                                        Your personal data will be used to process your order. <a href="#"
                                            target="_blank">Privacy
                                            Policy</a>.
                                    </div>
                                @else
                                    <div class="alert alert-warning mb-5">
                                        Your cart is empty. Please add items to proceed with checkout.
                                    </div>
                                @endif
                            </div>

                            <!-- Buttons -->
                            @if ($items->count() > 0)
                                <div class="row">
                                    <div class="col-md-12 text-center pt-2">
                                        <button type="button" class="btn btn-primary btn-checkout"
                                            id="placeOrderButton">PLACE ORDER</button>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkoutForm = document.getElementById('checkoutForm');
            const payOnDeliveryRadio = document.getElementById('pay_on_delivery');
            const payOnlineRadio = document.getElementById('checkout_payment_method_1');
            const placeOrderButton = document.getElementById('placeOrderButton');

            if (checkoutForm && payOnDeliveryRadio && payOnlineRadio && placeOrderButton) {
                function updateFormAction() {
                    if (payOnDeliveryRadio.checked) {
                        checkoutForm.action = "{{ route('payment-on-delivery') }}";
                        console.log('Form action is now:', checkoutForm.action);
                    } else if (payOnlineRadio.checked) {
                        checkoutForm.action = "{{ route('paynow') }}";
                    }
                }

                payOnDeliveryRadio.addEventListener('change', updateFormAction);
                payOnlineRadio.addEventListener('change', updateFormAction);

                placeOrderButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    console.log('Submitting form to:', checkoutForm.action);
                    checkoutForm.submit();
                });

                // Initialize action on page load
                updateFormAction();
            } else {
                console.error('Required elements were not found.');
            }
        });
    </script>
@endsection
