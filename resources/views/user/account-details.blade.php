@extends('layouts.app')
@section('content')
    <main class="pt-90">
        <div class="mb-4 pb-4"></div>
        <section class="my-account container">
            <h3 class="page-title text-center">{{ Auth::user()->name }} &nbsp; {{ Auth::user()->surname }}</h3>
            <div class="row">
                <div class="col-lg-2">
                    @include('user.account-nav')
                </div>
                <div class="col-lg-10">
                    <div class="page-content my-account__edit">
                        <div class="my-account__edit-form">
                            @if (Session::has('status'))
                                <p class="alert alert-success">{{ Session::get('status') }}</p>
                            @endif

                            <form name="account_edit_form" action="{{ route('user.updateAccount') }}" method="POST" class="needs-validation" novalidate="">
                                @csrf
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating my-3">
                                            <input type="text" class="form-control" placeholder="Name" name="name" value="{{ $user->name }}" required="">
                                            <label for="name">Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating my-3">
                                            <input type="text" class="form-control" placeholder="Surname" name="surname" value="{{ $user->surname }}" required="">
                                            <label for="surname">Surname</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating my-3">
                                            <input type="text" class="form-control" placeholder="Mobile Number" name="mobile" value="{{ $user->mobile }}" required="">
                                            <label for="mobile">Mobile Number</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating my-3">
                                            <input type="email" class="form-control" placeholder="Email Address" name="email" value="{{ $user->email }}" required="">
                                            <label for="account_email">Email Address</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating my-3">
                                            <input type="text" class="form-control" name="address" placeholder="Delivery Address" value="{{ $user->address }}">
                                            <label for="street">Delivery Address </label>
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="my-3">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
