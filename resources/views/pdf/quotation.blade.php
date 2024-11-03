<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quotation PDF</title>
    <style>
        body {
            font-family: 'Helvetica', sans-serif;
            margin: 20px;
            color: #333;
        }

        h1,
        h2,
        h3 {
            color: #0056b3;
        }

        .quotation-header {
            text-align: center;
            border-bottom: 2px solid #0056b3;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .quotation-header img {
            max-width: 150px;
            /* Limit the size of the logo */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        .total-amount {
            font-weight: bold;
            font-size: 1.2em;
            color: #d9534f;
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="quotation-header">
        {{-- <img src="{{ asset('assets/images/logo.png') }}" alt="Best for creative" class="logo__image d-block" /> --}}
        <h1>Quotation</h1>
        <h2>Quotation Number: {{ $data['quotation_number'] }}</h2>
        <p>Date: {{ $data['date'] }}</p>
        <p>Delivered To: {{ $data['company_name'] }} </p>
        <p>Location: {{ $data['delivery-location'] }}</p>
        <p>Prepared By: {{ $data['user-fullname'] }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Service</th>
                <th>Width (m)</th>
                <th>Height (m)</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data['services'] as $serviceId => $service)
                @if (isset($service['width'], $service['height'], $service['quantity'], $service['total_price']))
                    {{-- <div>
                        @dump($service)
                    </div> --}}
                    <tr>
                        <td>{{ $service['service_name'] ?? 'N/A' }}</td>
                        <td>{{ $service['width'] ?? 'N/A' }}</td>
                        <td>{{ $service['height'] ?? 'N/A' }}</td>
                        <td>{{ $service['quantity'] ?? 'N/A' }}</td>
                        <td>{{ $service['price_per_m2'] ?? 'N/A' }}</td>
                        <td>{{ $service['total_price'] ?? 'N/A' }}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>

    <p class="total-amount">Total Amount: ${{ $data['total_amount'] }}</p>
</body>

</html>
