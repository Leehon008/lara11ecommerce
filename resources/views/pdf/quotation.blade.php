<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha384-DyZ88mC6Up2uqS1d4+N49Zqzli37atHiC4CxReIcIt+S5v4fajp6HiFddJ8ZXzJf" crossorigin="anonymous">

    <title>Best for Creative | Quotation PDF</title>
    <style>
        body {
            font-family: 'Helvetica', sans-serif;
            margin: 20px;
            color: #333;
        }

        h3 {
            color: #e62222;;
            text-align: center;
            margin-bottom: 20px;
        }

        .quotation-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 20px;
            border-bottom: 2px solid #0056b3;
            padding-bottom: 10px;
        }

        .company-info, .quotation-details {
            width: 48%;
        }

        .company-info img {
            max-width: 150px;
            margin-bottom: 10px;
        }

        .icon-text {
            display: flex;
            align-items: center;
            margin: 5px 0;
        }

        .icon-text i {
            margin-right: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
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
            /* color: #262424; */
            text-align: right;
        }
    </style>
</head>

<body>
    <h3>Best for Creative Quotation Number: {{ $data['quotation_number'] }}</h3>
    <div class="quotation-header">
        <div style="text-align:center;">
            {{-- <img src="{{ $logo }}" name="logo" alt="BFC Company Logo"> --}}
            <span> sales@bestforcreative.co.zw &nbsp;&nbsp;&nbsp; +263 77 323 5698  &nbsp;&nbsp;&nbsp; 19034 Chitungwiza Industry</span>
        </div>
        <div class="quotation-details" style="margin-top:5px;margin-bottom:25px;">
            <h4 >CLIENT DETAILS</h4>
            <div>{{ $data['date'] }}</div>
            <div>{{ $data['user-fullname'] }}</div>
            <div>{{ $data['delivery-location'] }}</div>
        </div>
    </div>

    <!-- Services Table -->
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

    <!-- Delivery Fee and VAT -->
    <p>Delivery Fee: ${{ $data['deliveryFee'] }}</p>

    <p>VAT (15%): ${{ $data['vat'] }}</p>
    
    <!-- Total Amount -->
    <p class="total-amount">Total Amount: ${{ $data['total_amount'] }}</p>
</body>


</html>
