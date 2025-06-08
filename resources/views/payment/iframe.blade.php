<!DOCTYPE html>
<html>
<head>
    <title>Complete Payment</title>
    <style>
        body { margin: 0; padding: 0; }
        iframe { width: 100%; height: 100vh; border: none; }
    </style>
</head>
<body>
    <iframe src="{{ route('payment.display') }}" frameborder="0"></iframe>
</body>
</html>