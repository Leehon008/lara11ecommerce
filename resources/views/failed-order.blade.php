@extends('layouts.app')
@section('content')
    <main class="pt-90">

            <div class="mb-4 pb-4"></div>
            <section class="shop-checkout container">
                <div class="order-complete">
                    <div class="order-complete__message">
                        <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="40" cy="40" r="40" fill="#f44336" />
                            <path
                                d="M52.5 27.5L40 40L27.5 52.5M52.5 52.5L40 40L27.5 27.5"
                                stroke="white"
                                stroke-width="5"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>
                        <h3 style="color:rgb(13, 128, 0);"> Order Failed</h3>
                        <p>An unexpected error occurred, Please try again !.</p>
                    </div>
                    
                </div>
            </section>
       
    </main>
@endsection
