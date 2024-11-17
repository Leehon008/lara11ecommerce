@extends('layouts.app')

@section('content')
    <main class="pt-90">
        <div class="mb-4 pb-4"></div>
        <section class="login-register container">
            <ul class="nav nav-tabs mb-5" id="login_register" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link nav-link_underscore active" id="login-tab" data-bs-toggle="tab" href="#tab-item-login"
                        role="tab" aria-controls="tab-item-login" aria-selected="true">Forgot Password</a>
                </li>
            </ul>

            <div id="message"></div>

            <div class="tab-content pt-2" id="login_register_tab_content">
                <div class="tab-pane fade show active" id="tab-item-login" role="tabpanel" aria-labelledby="login-tab">
                    <div class="login-form">
                        <form method="POST" action="{{ route('password.email') }}" name="login-form" class="needs-validation"
                            novalidate="">
                            @csrf
                            <div class="form-floating mb-3">
                                <input class="form-control form-control_gray " type="email" id="email" name="email" placeholder="Enter your email" required>
                                <label for="email">Email address *</label>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="pb-3"></div>

                            <button class="btn btn-primary w-100 text-uppercase" type="submit">Reset Account Password</button>

                            <div class="customer-option mt-4 text-center">
                            
                                <a href="{{ route('login') }}" class="btn-text js-show-register">Login Instead</a>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
<script>
document.getElementById('forgotPasswordForm').addEventListener('submit', function(e) {
    e.preventDefault();
    let formData = new FormData(this);
    fetch('{{ route("password.email") }}', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        let messageDiv = document.getElementById('message');
        messageDiv.innerHTML = data.message;
        messageDiv.className = data.status === 'success' ? 'alert alert-success' : 'alert alert-danger';
    })
    .catch(error => {
        console.error('Error:', error);
        let messageDiv = document.getElementById('message');
        messageDiv.innerHTML = 'An error occurred. Please try again.';
        messageDiv.className = 'alert alert-danger';
    });
});
</script>
</script>
@endsection
