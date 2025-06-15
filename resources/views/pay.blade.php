<!DOCTYPE html>
<html>
<head><title>Pay with KHQR</title></head>
<body>
    <h2>Scan this KHQR</h2>
    @if ($qrUrl)
        <img src="{{ $qrUrl }}" alt="KHQR">
    @else
        <p>Something went wrong. Please try again.</p>
    @endif

    <script>
        setInterval(() => {
            fetch(`/pay/check/{{ $tranId }}`)
                .then(res => res.json())
                .then(data => {
                    if (data.response_code === '0') {
                        alert('✅ Payment Successful');
                        window.location.href = '/pay/success';
                    }
                });
        }, 3000);
    </script>
</body>
</html>
