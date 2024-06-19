<!DOCTYPE html>
<html>
<head>
    <title>Order Paid</title>
</head>
<body>
<h2>Order Paid Successfully</h2>
<p>Dear {{ $order->customer }},</p>
<p>Your order has been paid successfully. Here are the details of your order:</p>
<table>
    <tr>
        <td>Product:</td>
        <td>{{ $order->product }}</td>
    </tr>
    <tr>
        <td>Quantity:</td>
        <td>{{ $order->quantity }}</td>
    </tr>
    <tr>
        <td>Unit Price:</td>
        <td>{{ $order->unit_price }}</td>
    </tr>
    <tr>
        <td>Total Price:</td>
        <td>{{ $order->total_price }}</td>
    </tr>
</table>
<p>Thank you for your purchase!</p>
</body>
</html>
