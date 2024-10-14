@extends('frontend.layout.app')
@section('title', 'Instant Online Quotation | Best For Creative')
@section('content')
<main class="pt-90">
    <div class="mb-md-1 pb-md-3"></div>
    <section class="product-single container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-single__details-tab">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link nav-link_underscore active" id="tab-description-tab"
                                data-bs-toggle="tab" href="#tab-description" role="tab"
                                aria-controls="tab-description" aria-selected="true">User Details</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link nav-link_underscore" id="tab-additional-info-tab"
                                data-bs-toggle="tab" href="#tab-additional-info" role="tab"
                                aria-controls="tab-additional-info" aria-selected="false">Specifications</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link nav-link_underscore" id="tab-reviews-tab" data-bs-toggle="tab"
                                href="#tab-reviews" role="tab" aria-controls="tab-reviews"
                                aria-selected="false">Print Quotation</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-description" role="tabpanel"
                            aria-labelledby="tab-description-tab">
                            <div class="product-single__review-form">
                                <div class="form-label-fixed mb-4">
                                    <label for="form-input-name" class="form-label">Full Name or Company Name
                                        *</label>
                                    <input id="form-input-name"
                                        class="form-control form-control-md form-control_gray" required />
                                </div>
                                <div class="form-label-fixed mb-4">
                                    <label for="form-input-phone" class="form-label">Phone Number *</label>
                                    <input id="form-input-phone"
                                        class="form-control form-control-md form-control_gray" required />
                                </div>
                                <div class="form-label-fixed mb-4">
                                    <label for="form-input-email" class="form-label">Email address *</label>
                                    <input id="form-input-email"
                                        class="form-control form-control-md form-control_gray" required />
                                </div>
                                <div class="form-group">
                                    <label for="${serviceKey}-delivery-location" class="form-label">Delivery Location *</label>
                                    <select id="${serviceKey}-delivery-location" class="form-control select2" required>
                                        <option value="">Select Location</option>
                                        <option value="Own Delivery">Own Delivery</option>
                                        <option value="Bulawayo">Bulawayo</option>
                                        <option value="Bindura">Bindura</option>
                                        <option value="Mount Darwin">Mount Darwin</option>
                                        <option value="Glendale">Glendale</option>
                                        <option value="Shamva">Shamva</option>
                                        <option value="Mazowe">Mazowe</option>
                                        <option value="Centenary">Centenary</option>
                                        <option value="Guruve">Guruve</option>
                                        <option value="Marondera">Marondera</option>
                                        <option value="Murehwa">Murehwa</option>
                                        <option value="Ruwa">Ruwa</option>
                                        <option value="Goromonzi">Goromonzi</option>
                                        <option value="Mutoko">Mutoko</option>
                                        <option value="Chivhu">Chivhu</option>
                                        <option value="Wedza">Wedza</option>
                                        <option value="Macheke">Macheke</option>
                                        <option value="Chinhoyi">Chinhoyi</option>
                                        <option value="Karoi">Karoi</option>
                                        <option value="Kariba">Kariba</option>
                                        <option value="Norton">Norton</option>
                                        <option value="Chegutu">Chegutu</option>
                                        <option value="Kadoma">Kadoma</option>
                                        <option value="Banket">Banket</option>
                                        <option value="Magunje">Magunje</option>
                                        <option value="Murombedzi">Murombedzi</option>
                                        <option value="Mutare">Mutare</option>
                                        <option value="Rusape">Rusape</option>
                                        <option value="Nyanga">Nyanga</option>
                                        <option value="Chipinge">Chipinge</option>
                                        <option value="Chimanimani">Chimanimani</option>
                                        <option value="Murambinda">Murambinda</option>
                                        <option value="Birchenough Bridge">Birchenough Bridge</option>
                                        <option value="Headlands">Headlands</option>
                                        <option value="Odzi">Odzi</option>
                                        <option value="Gweru">Gweru</option>
                                        <option value="Kwekwe">Kwekwe</option>
                                        <option value="Zvishavane">Zvishavane</option>
                                        <option value="Shurugwi">Shurugwi</option>
                                        <option value="Gokwe">Gokwe</option>
                                        <option value="Mvuma">Mvuma</option>
                                        <option value="Lalapanzi">Lalapanzi</option>
                                        <option value="Redcliff">Redcliff</option>
                                        <option value="Masvingo">Masvingo</option>
                                        <option value="Chiredzi">Chiredzi</option>
                                        <option value="Triangle">Triangle</option>
                                        <option value="Mwenezi">Mwenezi</option>
                                        <option value="Bikita">Bikita</option>
                                        <option value="Mashava">Mashava</option>
                                        <option value="Zaka">Zaka</option>
                                        <option value="Hwange">Hwange</option>
                                        <option value="Victoria Falls">Victoria Falls</option>
                                        <option value="Lupane">Lupane</option>
                                        <option value="Binga">Binga</option>
                                        <option value="Dete">Dete</option>
                                        <option value="Nkayi">Nkayi</option>
                                        <option value="Tsholotsho">Tsholotsho</option>
                                        <option value="Gwanda">Gwanda</option>
                                        <option value="Beitbridge">Beitbridge</option>
                                        <option value="Plumtree">Plumtree</option>
                                        <option value="Esigodini">Esigodini</option>
                                        <option value="Filabusi">Filabusi</option>
                                    </select>
                                </div>
                                <!-- <div class="form-check mb-4">
                <input class="form-check-input form-check-input_fill" type="checkbox" value="" id="remember_checkbox" />
                <label class="form-check-label" for="remember_checkbox">Save My Details.</label>
            </div> -->
                                <div class="form-action">
                                    <button type="button" class="btn btn-primary"
                                        onclick="nextTab('tab-additional-info')">NEXT</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-additional-info" role="tabpanel"
                            aria-labelledby="tab-additional-info-tab">
                            <div class="product-single__review-form">
                                <h3 class="text-center mb-5">SELECT SERVICE</h3>
                                <div class="checkbox-group text-uppercase">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4">
                                            <div class="form-check mb-4">
                                                <label>
                                                    <input class="form-check-input form-check-input_fill"
                                                        type="checkbox" name="services[]" value="Sliding Gates"
                                                        data-input="sliding-gates-inputs"> Sliding Gates
                                                </label>
                                            </div>
                                            <div class="form-check mb-4">
                                                <label>
                                                    <input class="form-check-input form-check-input_fill"
                                                        type="checkbox" name="services[]" value="Sliding Doors"
                                                        data-input="sliding-doors-inputs"> Sliding Doors
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="form-check mb-4">
                                                <label>
                                                    <input class="form-check-input form-check-input_fill"
                                                        type="checkbox" name="services[]" value="Veranda Screens"
                                                        data-input="veranda-screens-inputs"> Veranda Screens
                                                </label>
                                            </div>
                                            <div class="form-check mb-4">
                                                <label>
                                                    <input class="form-check-input form-check-input_fill"
                                                        type="checkbox" name="services[]" value="Window Frames"
                                                        data-input="window-frames-inputs"> Window Frames
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="form-check mb-4">
                                                <label>
                                                    <input class="form-check-input form-check-input_fill"
                                                        type="checkbox" name="services[]" value="Tank Stands"
                                                        data-input="tank-stands-inputs"> Tank Stands
                                                </label>
                                            </div>
                                            <div class="form-check mb-4">
                                                <label>
                                                    <input class="form-check-input form-check-input_fill"
                                                        type="checkbox" name="services[]" value="Carports"
                                                        data-input="carports-inputs"> Carports
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="service-details">
                                    <!-- Dynamic input fields will be inserted here -->
                                </div>

                                <div class="form-action">
                                    <button type="button" class="btn btn-secondary"
                                        onclick="prevTab('tab-description')">BACK</button>
                                    <button type="button" class="btn btn-primary"
                                        onclick="nextTab('tab-reviews')">NEXT</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-reviews" role="tabpanel"
                            aria-labelledby="tab-reviews-tab">
                            <div class="product-single__review-form">
                                <!-- Add your fields for printing the quotation here -->
                                <div class="form-action">
                                    <button type="button" class="btn btn-secondary"
                                        onclick="prevTab('tab-additional-info')">BACK</button>
                                    <button type="submit" class="btn btn-primary">Generate Quotation</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- /.products-carousel container -->
</main>
@endsection