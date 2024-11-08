@extends('layouts.app')
@section('content')
    <div class="">
        <a href="{{ route('user.index') }}" type="button" class="">Return
            Home</a>

        <form method="POST" class="form-new-product form-style-1" action="{{ route('cart.process_payment') }}">
            @csrf
            <div class="mb-6">
                <label for="email" class="">Email</label>
                <input type="email" id="email" name="email" class="" placeholder="Email"
                    value="bestofcreative101@gmail.com" readonly>
            </div>

            <div class="mb-6">
                <label for="email" class="">Phone
                    Number</label>
                <input type="text" id="phone_number" name="phone_number" class="" value="0774444444" readonly>
            </div>

            <div class="mb-6">
                <label for="amount" class="">Amount</label>
                <input type="number" id="amount" name="amount" class="" value="1">
            </div>

            <button type="submit" class="">Submit</button>
        </form>
    </div>
    </div>
@endsection
