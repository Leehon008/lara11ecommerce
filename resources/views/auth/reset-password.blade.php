@extends('layouts.app')

@section('content')
    <main class="pt-90">
        <div class="mb-4 pb-4"></div>
        <section class="login-register container">
            <ul class="nav nav-tabs mb-5" id="login_register" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link nav-link_underscore active" id="login-tab" data-bs-toggle="tab" href="#tab-item-login"
                        role="tab" aria-controls="tab-item-login" aria-selected="true">Create New Password</a>
                </li>
            </ul>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="tab-content pt-2" id="login_register_tab_content">
                <div class="tab-pane fade show active" id="tab-item-login" role="tabpanel" aria-labelledby="login-tab">
                    <div class="login-form">
                        <form method="POST" action="{{ route('password.update') }}" name="login-form" class="needs-validation"
                            novalidate="">
                            @csrf
                            <input type="hidden" name="token" value="{{ request()->query('token') }}">
                            <input type="hidden" name="email" value="{{ request()->query('email') }}">
                            <div class="form-floating mb-3">
                                <input class="form-control form-control_gray " type="password" name="password" placeholder="New password" required>
                                <label for="password">Password *</label>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control form-control_gray " type="password" name="password_confirmation" placeholder="Confirm New password" required>
                                <label for="password">Confirm New Password *</label>
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="pb-3"></div>

                            <button class="btn btn-primary w-100 text-uppercase" type="submit">Reset Password</button>

                            <div class="customer-option mt-4 text-center">
                                <a href="{{ route('login') }}" class="btn-text js-show-register">Login Instead</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
