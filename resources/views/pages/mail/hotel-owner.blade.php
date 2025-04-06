<x-layouts.layout>
    <div class="min-h-screen flex flex-col justify-center items-center px-4">
        <form class="w-full max-w-md rounded-2xl shadow-xl p-8 border border-gray-700" action="{{route('verify.otp')}}" method="POST">
            @csrf
            <div class="mb-8 text-center">
                <div class="mx-auto w-16 h-16 flex items-center justify-center rounded-full bg-gray-500 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-800">Verify Your Account</h2>
                <p class="text-gray-400 mt-2">Please enter the 6-digit code sent to your email</p>
            </div>
            
            <x-input.otp class="mb-6"/>
            
            <div class="flex items-center justify-center mb-6 text-sm text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>Code expires in <span class="font-medium text-gray-500" x-text="timer" x-data="{ timer: '01:30' }">01:30</span></span>
            </div>
            @error('code')
                <div class="text-red-400 text-sm mb-3 text-center">{{ $message }}</div>
            @enderror
            @if (session('success'))
                <div class="text-green-400 text-sm mb-3 text-center">
                    {{ session('success') }}
                </div>
            @endif
            
            <div class="mb-6">
                <x-buttons.button type="submit" variant="primary" class="w-full" >
                    Verify OTP
                </x-buttons.button>
            </div>
            
            <div class="text-center text-sm">
                <span class="text-gray-500">Didn't receive the code?</span>
               <x-buttons.link
                    onclick="event.preventDefault(); document.getElementById('resend-form').submit();"
                    class="text-indigo-600 px-1 hover:bg-transparent">
                    Resend Code
               </x-buttons.link>
            </div>
            
            <div class="mt-2 text-center">
                <x-buttons.link href="{{route('login')}}" class="inline-flex items-center text-sm text-gray-500 hover:text-indigo-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to login
                </x-buttons.link>
            </div>
        </form>
        
        <div class="mt-8 text-center text-sm text-gray-500">
            <p>Having trouble? <a href="#" class="text-indigo-600 hover:underline">Contact Support</a></p>
        </div>
    </div>


    {{-- hidden form --}}
    <form id="resend-form" action="{{ route('resendOTP') }}" method="POST" class="hidden">
        @csrf
    </form>
</x-layouts.layout>

