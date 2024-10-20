@extends('layouts.admin')
@section('content')
    <div class="main-content-inner">

        <div class="main-content-wrap">
            <div class="tf-section-2 mb-30">

                <div class="wg-box">
                    <fieldset class="brand">
                        <div class="body-title mb-10">Product Design <span class="tf-color-1">*</span>
                        </div>
                        <div class="select">
                            <select class="" name="brand_id">
                                <option>Choose Design</option>
                            
                                    <option value="">Design</option>
                                    <option value="">Design</option>
                                    <option value="">Design</option>
                                    <option value="">Design</option>
                                    <option value="">Design</option>
                            
                            </select>
                        </div>
                    </fieldset>

                    <fieldset class="dimensions form-group">
                        <div class="body-title mb-10">Product Dimensions m<sup>2</sup> <span class="tf-color-1">*</span>
                        </div>
                        <input class="mb-10 form-control input-lg" type="number" placeholder="dimensions in Square Meters" name="dimensions" 
                            value="" aria-required="true" required="">

                    </fieldset>

                    <fieldset class="price_m2 form-group">
                        <div class="body-title mb-10">Product Sale Price / m<sup>2</sup> <span class="tf-color-1">*</span>
                        </div>
                        <input class="mb-10 form-control input-lg" type="number" placeholder="Price" name="price_m2" tabindex="0"
                            value="" aria-required="true" required="">

                    </fieldset>
                    
                </div>

            </div>
            <div class="tf-section mb-30">

                <div class="wg-box">
                    <div class="flex items-center justify-between">
                        <h5>Quotations Dimensions and Pricing</h5>
                        <div class="dropdown default">
                            <a class="btn btn-secondary dropdown-toggle" href="#">
                                <span class="view-all">View all</span>
                            </a>
                        </div>
                    </div>
                    <div class="wg-table table-all-user">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 80px">OrderNo</th>
                                        <th>Name</th>
                                        <th class="text-center">Phone</th>
                                        <th class="text-center">Subtotal</th>
                                        <th class="text-center">Tax</th>
                                        <th class="text-center">Total</th>

                                        <th class="text-center">Status</th>
                                        <th class="text-center">Order Date</th>
                                        <th class="text-center">Total Items</th>
                                        <th class="text-center">Delivered On</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="text-center">Divyansh Kumar</td>
                                        <td class="text-center">1234567891</td>
                                        <td class="text-center">$172.00</td>
                                        <td class="text-center">$36.12</td>
                                        <td class="text-center">$208.12</td>

                                        <td class="text-center">ordered</td>
                                        <td class="text-center">2024-07-11 00:54:14</td>
                                        <td class="text-center">2</td>
                                        <td></td>
                                        <td class="text-center">
                                            <a href="#">
                                                <div class="list-icon-function view-icon">
                                                    <div class="item eye">
                                                        <i class="icon-eye"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
