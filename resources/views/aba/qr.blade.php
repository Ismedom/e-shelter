<x-layouts.main>
    <div class="flex flex-col items-center justify-center py-12">
        <h1 class="text-2xl font-bold text-center mb-4">Scan to Pay with ABA</h1>

        <img src="{{ $qrImage }}" alt="ABA QR Code" class="w-64 h-64 border shadow-md rounded-lg" />

        <p class="mt-4 text-sm text-gray-600">Scan this QR code with the ABA Mobile app to complete your payment.</p>

        <a href="{{ $abapay_deeplink }}" class="mt-6 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Open in ABA App
        </a>

        <div class="mt-6 space-x-4">
            <a href="{{ $app_store }}" target="_blank">
                <img src="https://developer.apple.com/assets/elements/badges/download-on-the-app-store.svg" class="h-10 inline" alt="App Store">
            </a>
            <a href="{{ $play_store }}" target="_blank">
                <img src="https://play.google.com/intl/en_us/badges/static/images/badges/en_badge_web_generic.png" class="h-10 inline" alt="Play Store">
            </a>
        </div>
    </div>
</x-layouts.main>
