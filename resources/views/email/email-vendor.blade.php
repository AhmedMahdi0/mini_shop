<!DOCTYPE html>
<html>
<head>
    <title>Low Inventory Alert</title>
</head>
<body>
<h1>Hello {{ $data['vendorName'] }},</h1>
<p>The inventory for product "{{ $data['productName'] }}" is currently less than 50. Please take necessary action.</p>
<p>Thank you for your attention.</p>
</body>
</html>
