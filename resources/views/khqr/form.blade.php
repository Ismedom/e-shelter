<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Bakong KHQR Payment</title>
    <script src="https://cdn.jsdelivr.net/npm/qrcodejs@1.0.0/qrcode.min.js"></script>
</head>
<body>
    <h1>Generate KHQR Payment QR Code</h1>

    <form id="paymentForm">
        <label for="amount">Amount (KHR):</label>
        <input type="number" name="amount" id="amount" min="100" required />
        <button type="submit">Generate QR</button>
    </form>

    <div id="qrCode" style="margin-top: 20px;"></div>

    <script>
        const form = document.getElementById('paymentForm');
        const qrCodeDiv = document.getElementById('qrCode');
        let qrcode;

        form.addEventListener('submit', async e => {
            e.preventDefault();

            const amount = form.amount.value;
            if (amount < 100) {
                alert("Amount must be at least 100 KHR");
                return;
            }

            const response = await fetch('/khqr/generate', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({ amount }),
            });

            const data = await response.json();
            qrCodeDiv.innerHTML = '';

            qrcode = new QRCode(qrCodeDiv, {
                text: data.khqrPayload,
                width: 256,
                height: 256,
            });
        });
    </script>
</body>
</html>
