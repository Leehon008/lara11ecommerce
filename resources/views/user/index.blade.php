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
                    <div class="page-content my-account__dashboard">
                        <table id="ordersTable" class="display stripe" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Order Date</th>
                                    <th>Status</th>
                                    <th>Total Amount</th>
                                    <th>Items</th>
                                    <th>Payment Method</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                <tr>
                                    <td>102393</td>
                                    <td>12 Dec 2024</td>
                                    <td class="badge bg-danger">Pending</td>
                                    <td>400</td>
                                    <td>5</td>
                                    <td>Cash on Delivery</td>
                                    <td>
                                        <a href="#" class="btn btn-info">
                                            <i class="fa fa-eye"></i> View
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>102393</td>
                                    <td>12 Dec 2024</td>
                                    <td class="badge bg-danger">Pending</td>
                                    <td>400</td>
                                    <td>5</td>
                                    <td>Cash on Delivery</td>
                                    <td>
                                        <a href="#" class="btn btn-info">
                                            <i class="fa fa-eye"></i> View
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>102393</td>
                                    <td>12 Dec 2024</td>
                                    <td class="badge bg-danger">Pending</td>
                                    <td>400</td>
                                    <td>5</td>
                                    <td>Cash on Delivery</td>
                                    <td>
                                        <a href="#" class="btn btn-info">
                                            <i class="fa fa-eye"></i> View
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>102393</td>
                                    <td>12 Dec 2024</td>
                                    <td class="badge bg-danger">Pending</td>
                                    <td>400</td>
                                    <td>5</td>
                                    <td>Cash on Delivery</td>
                                    <td>
                                        <a href="#" class="btn btn-info">
                                            <i class="fa fa-eye"></i> View
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>102393</td>
                                    <td>12 Dec 2024</td>
                                    <td class="badge bg-danger">Pending</td>
                                    <td>400</td>
                                    <td>5</td>
                                    <td>Cash on Delivery</td>
                                    <td>
                                        <a href="#" class="btn btn-info">
                                            <i class="fa fa-eye"></i> View
                                        </a>
                                    </td>
                                </tr>
                             
                                {{-- uncomment and replce content above --}}
                                {{-- @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->order_date }}</td>
                                    <td>{{ $order->status }}</td>
                                    <td>{{ $order->total_amount }}</td>
                                    <td>{{ $order->items_count }}</td>
                                    <td>
                                        <a href="{{ route('order.view', $order->id) }}" class="btn btn-info">
                                            <i class="fa fa-eye"></i> View
                                        </a>
                                    </td>
                                </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                        <script>
                            $(document).ready(function() {
                                $('#ordersTable').DataTable({
                                    "paging": true,
                                    "searching": true,
                                    "info": true,
                                    "ordering": true
                                });
                            });
                        </script>
                        
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
