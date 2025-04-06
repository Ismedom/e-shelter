<x-layouts.layout>
        <div class="flex min-h-screen flex-col justify-center items-center px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-10 w-auto" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
            <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-300">Sign in to your account</h2>
            </div>       
            <div class="mt-8 w-[calc(100%-20px)] sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-5" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="">
                        <label for="email" class="block text-sm/6 font-medium text-gray-300">Email address</label>
                        <div>
                            <input type="email" 
                                name="email" 
                                id="email" 
                                autocomplete="email" 
                                required 
                                placeholder="example@gmail.com"
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
                            <input type="password" 
                                name="password" 
                                id="password" 
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


                    <div class="text-sm mb-2">
                        <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>

                    </div>

                    <div>
                        <x-buttons.button type="submit" variant="primary" class="block w-full text-center">Sign in</x-buttons.button>
                    </div>
                </form>
                <p class="mt-4 text-center text-sm/6 text-gray-500">
                    Don't have an account?
                    <x-buttons.link href="{{route('register')}}" class="font-semibold text-indigo-600 hover:text-indigo-500 px-2">Register</x-buttons.link>
                </p>
            </div>
        </div>
        
</x-layouts.layout>