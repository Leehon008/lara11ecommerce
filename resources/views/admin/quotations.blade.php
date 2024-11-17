@extends('layouts.admin')
@section('content')
    <div class="main-content-inner">

        <div class="main-content-wrap">
            
            <div class="tf-section mb-30">

                <div class="wg-box">
                    <div class="flex items-center justify-between">
                        <h5>Quotations Dimensions and Pricing| Not Done YEt</h5>
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
                                        <th style="width: 80px">QuoteID</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Phone</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Location</th>
                                        <th class="text-center">Pdf</th>
                                        
                                        <th class="text-center">Total</th>
                                        <th class="text-center">Order Date</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="text-center">Tinotenda Mangadza</td>
                                        <td class="text-center">0779013009</td>
                                        <td class="text-center">admin@codewand.tech</td>
                                        <td class="text-center">Harare</td>
                                       
                                        <td class="text-center">quotation-27838923.pdf</td>
                                         <td class="text-center">$172.00</td>
                                        <td class="text-center">2024-07-11 00:54:14</td>

                                       
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
