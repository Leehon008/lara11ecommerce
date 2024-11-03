@extends('frontend.layout.app')
@section('title', 'Instant Online Quotation | Best For Creative')
@section('content')
<main class="pt-90">
    <div class="mb-md-1 pb-md-3"></div>
    <section class="product-single container">
        
        <form id="quotationForm" class="mb-4" action="{{ route('generate.pdf') }}" method="POST">
            @csrf
            <div class="card shadow-lg p-4">
                <!-- Card Header -->
                <div class="card-header text-center">
                    <h3>Instant Quotation</h3>
                </div>
                
                <!-- Card Body -->
                <div class="card-body">
                    <!-- User Details Section -->
                    <div class="mb-4">
                        <h4 class="text-center text-uppercase text-danger mb-3">User Details</h4>
                        <input type="hidden" name="quotation_number" id="quotation_number">
                        <input type="hidden" name="date" id="date">
                        <div class="form-label-fixed mb-4">
                            <label for="user-fullname" class="form-label">Full Name or Company Name *</label>
                            <input id="user-fullname" name="user-fullname" class="form-control form-control-md form-control_gray" required />
                        </div>
                        <div class="row">
                            <div class="form-label-fixed mb-4 col-md-4">
                                <label for="user-phone" class="form-label">Phone Number *</label>
                                <input id="user-phone" name="user-phone" class="form-control form-control-md form-control_gray" required />
                            </div>
                            <div class="form-label-fixed mb-4 col-md-8">
                                <label for="user-email" class="form-label">Email address *</label>
                                <input id="user-email" name="user-email" class="form-control form-control-md form-control_gray" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="delivery-location" class="form-label">Delivery Location (City / Town) *</label>
                            <select id="delivery-location" name="delivery-location" class="form-control select2" required>
                                <!-- Location options will be dynamically populated by JavaScript -->
                            </select>
                        </div>
                    </div>
        
                    <!-- Service Selection Section -->
                    <div class="mb-4">
                        <h4 class="text-center text-uppercase text-danger mb-3">Select Service</h4>
                        <div class="checkbox-group text-uppercase">
                            <div class="row">
                                @foreach ($categories as $category)
                                    <div class="col-md-4">
                                        <div class="form-check mb-3">
                                            <input 
                                                class="form-check-input form-check-input_fill service-checkbox" 
                                                type="checkbox" 
                                                name="services[]" 
                                                value="{{ $category->id }}" 
                                                data-service-name="{{ $category->id }}">
                                            <label>{{ $category->name }}</label>
                                        </div>
                                        <!-- Placeholder for dynamic dropdowns based on selected category -->
                                        <div id="category-{{ $category->id }}-dropdown"></div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        
                        <!-- Service Details (Dynamic Input Fields) -->
                        <div id="service-details" class="mt-4">
                            <!-- Dynamic input fields will be inserted here based on selected services -->
                        </div>
                    </div>
                
                    <!-- Form Actions -->
                    <div class="form-action text-center">
                        <button type="submit" class="btn btn-primary">Generate PDF Quotation</button>
                    </div>
                </div>
            </div>
        </form>

    </section>

    <!-- /.products-carousel container -->
</main>
@endsection
