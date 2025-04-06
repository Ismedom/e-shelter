
{{-- sign up form --}}

<x-layouts.layout>
    <div class="flex min-h-screen flex-col justify-center items-center px-6 py-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-10 w-auto" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
            <h2 class="mt-6 text-center text-2xl/9 font-bold tracking-tight text-gray-300">Sign Up</h2>
        </div>       
        <div class="mt-4 w-[calc(100%-20px)] sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-5" method="POST" action="{{ route('register') }}">
                @csrf
                <div>
                    <div class="flex items-center justify-between mt-1">
                        <label for="email" class="block text-sm/6 font-medium text-gray-300">Email</label>
                    </div>
                    <div>
                        <input 
                        type="email" 
                        name="email"
                        autocomplete="current-email" 
                        required 
                        placeholder="email"
                        value="{{ old('email') }}"
                        class="block w-full rounded-md bg-gray-700 px-3 py-1.5 text-base text-gray-300 outline-1 -outline-offset-1 outline-gray-500 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                    </div>
                    @error('email')
                        <div class="text-red-400 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <div class="flex items-center justify-between mt-1">
                        <label for="password" class="block text-sm/6 font-medium text-gray-300">Password</label>
                    </div>
                    <div>
                        <input 
                        type="password" 
                        name="password"
                        autocomplete="current-password" 
                        required 
                        placeholder="password"
                        value="{{ old('password') }}"
                        class="block w-full rounded-md bg-gray-700 px-3 py-1.5 text-base text-gray-300 outline-1 -outline-offset-1 outline-gray-500 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                    </div>
                    @error('password')
                        <div class="text-red-400 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <div class="flex items-center justify-between mt-1">
                        <label for="confirm_password" class="block text-sm/6 font-medium text-gray-300">Confirm password</label>
                    </div>
                    <div>
                        <input 
                        type="password" 
                        name="password_confirmation" 
                        autocomplete="current-confirm_password" 
                        required 
                        placeholder="confirm password"
                        value="{{ old('password_confirmation') }}"
                        class="block w-full rounded-md bg-gray-700 px-3 py-1.5 text-base text-gray-300 outline-1 -outline-offset-1 outline-gray-500 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                    </div>
                    @error('password_confirmation')
                        <div class="text-red-400 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <div class="flex items-center mb-4">
                        <input 
                        type="checkbox" 
                        name="accept"
                        {{ old('accept') ? 'checked' : '' }}
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 cursor-pointer">
                    
                        <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            <p class="text-gray-400">
                                I agree to the Terms of Service,the Privacy Policy.
                            </p>
                        </label>
                    </div>
                </div>
                {{--  --}}
                <div>
                    <x-buttons.button type="submit" variant="primary" class="block w-full text-center">Sign Up</x-buttons.button>
                </div>
            </form>
            <p class="mt-4 text-center text-sm/6 text-gray-500">
                Ready have an account?
                <x-buttons.link href="{{route('login')}}" class="font-semibold text-indigo-600 hover:text-indigo-500 px-2">Login</x-buttons.link>
            </p>
        </div>
    </div>
    
</x-layouts.layout>