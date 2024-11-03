<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Quotation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

    <h2>Quotation</h2>
    <p><strong>Quotation Number:</strong> {{ $data['quotation_number'] ?? 'N/A' }}</p>
    <p><strong>Date:</strong> {{ $data['date'] ?? 'N/A' }}</p>
    <p><strong>Name:</strong> {{ $data['user-fullname'] }}</p>
    <p><strong>Delivery Location:</strong> {{ $data['delivery-location'] }}</p>

    <h3>Services</h3>
    <table>
        <thead>
            <tr>
                <th>Service</th>
                <th>Width (m)</th>
                <th>Height (m)</th>
                <th>Quantity</th>
                <th>Price per m²</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data['services'] as $serviceId => $service)
                @if (isset($service['width'], $service['height'], $service['quantity']))
                    <div>
                        @dump($service)
                    </div>
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

    <h3>Total Amount</h3>
    <p><strong>Total:</strong> ${{ $data['total_amount'] }}</p>


</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Set the current date
        const currentDate = new Date().toISOString().slice(0, 10); // Format: YYYY-MM-DD
        document.getElementById("date").value = currentDate;

        // Generate a unique quotation number (you could use a more complex logic here if needed)
        const quotationNumber = `Q-${Math.floor(Math.random() * 1000000)}`;
        document.getElementById("quotation_number").value = quotationNumber;
    });
</script>

</html>
