@extends('layouts.app')
@section('content')
    <main class="pt-90">
        <div class="mb-4 pb-4"></div>

        <div id="preload" class="preload-container">
            <div class="preloading">
                <span></span>
            </div>
        </div>
        <section class="my-account container">
            <h3 class="page-title text-center">{{ Auth::user()->name }} {{ Auth::user()->surname }}</h3>
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
                                    <th>Items</th>
                                    <th>Payment Method</th>
                                    <th>Total Amount</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td align="center">{{ $order->id }}</td>
                                        <td>{{ $order->created_at->format('d M, Y') }}</td>
                                        <td class="badge" style="background-color: rgb(38, 144, 38)">
                                            {{ ucfirst($order->status) }}</td>
                                        <td>{{ $order->cart_item_count }}</td>
                                        <td>{{ $order->payment_method }}</td>
                                        <td align="center">${{ number_format(floatval($order->amount), 2) }}</td>
                                        <td>
                                            <a href="{{ route('user.order.view', ['id' => $order->id]) }}">
                                                <i class="fa fa-eye"></i> View
                                            </a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Pagination links -->
                        <div class="pagination-wrapper mt-4">
                            {{ $orders->links() }} <!-- This will generate pagination links -->
                        </div>
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
