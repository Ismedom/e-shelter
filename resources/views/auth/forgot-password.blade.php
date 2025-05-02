<x-layouts.main>
    <div class="flex min-h-screen flex-col justify-center items-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-10 w-auto" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
            <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-700 dark:text-gray-300">{{trans('forgot_password')}}</h2>
        </div>
        
        <div class="mt-8 w-[calc(100%-20px)] sm:mx-auto sm:w-full sm:max-w-sm">
            @if (session('status'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('status') }}</span>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif
            
            <form class="space-y-5" method="POST" action="{{ route('password.email') }}">
                @csrf
                <div>
                    <div class="flex items-center justify-between mt-1">
                        <label for="email" class="block text-sm/6 font-medium text-gray-500 dark:text-gray-300">{{trans('email')}}</label>
                    </div>
                    <div>
                        <input 
                            type="email" 
                            name="email" 
                            id="email" 
                            autocomplete="email" 
                            required 
                            placeholder="example@gmail.com"
                            value="{{ old('email') }}"
                            class="block w-full rounded-md bg-gray-50 dark:bg-gray-700 px-3 py-1.5 text-base text-gray-600 dark:text-gray-300 outline-1 -outline-offset-1 outline-gray-500 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                        >
                    </div>
                    @error('email')
                        <div class="text-red-400 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <x-buttons.button type="submit" variant="primary" class="block w-full text-center">{{trans('send_reset_link')}}</x-buttons.button>
                </div>
            </form>
            
            <p class="mt-4 text-center text-sm/6 text-gray-500">
                {{trans('remember_password')}}?
                <x-buttons.link href="{{route('login')}}" class="font-semibold text-indigo-600 hover:text-indigo-500 px-2 bg-transparent hover:bg-transparent">{{trans('login')}}</x-buttons.link>
            </p>
        </div>
    </div>
</x-layouts.main>