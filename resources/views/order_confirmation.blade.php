@extends('layouts.app')
@section('content')
    <main class="pt-90">
        <div class="mb-4 pb-4"></div>
        <section class="shop-checkout container">
            <h2 class="page-title">Shipping and Checkout</h2>
            @if ($items)
                <div class="alert alert-info">
                    <p style="color:rgb(13, 128, 0);pt:1px;"> {!! $items !!}</p>
                </div>
            @endif

            @if (session('items'))
                <!-- Display cart items -->
                @foreach (session('items') as $item)
                    <p>{{ $item->name }}</p>
                @endforeach
            @endif

        </section>
    </main>
@endsection
