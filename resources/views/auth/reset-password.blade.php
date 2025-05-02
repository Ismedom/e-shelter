<x-layouts.main>
    <div class="flex min-h-screen flex-col justify-center items-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-10 w-auto" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
            <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-700 dark:text-gray-300">{{trans('reset_password')}}</h2>
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
            
            <form class="space-y-5" method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="email" value="{{ $email }}">
                
                <div>
                    <div class="flex items-center justify-between mt-1">
                        <label for="email" class="block text-sm/6 font-medium text-gray-500 dark:text-gray-300">{{trans('email')}}</label>
                    </div>
                    <div>
                        <input 
                            type="email" 
                            id="email" 
                            value="{{ $email }}" 
                            disabled
                            class="block w-full rounded-md bg-gray-100 dark:bg-gray-600 px-3 py-1.5 text-base text-gray-600 dark:text-gray-300 outline-1 -outline-offset-1 outline-gray-500 sm:text-sm/6"
                        >
                    </div>
                </div>
                
                <div>
                    <div class="flex items-center justify-between mt-1">
                        <label for="password" class="block text-sm/6 font-medium text-gray-500 dark:text-gray-300">{{trans('new_password')}}</label>
                    </div>
                    <div>
                        <input 
                            type="password" 
                            name="password" 
                            id="password" 
                            required 
                            placeholder="New password"
                            class="block w-full rounded-md bg-gray-50 dark:bg-gray-700 px-3 py-1.5 text-base text-gray-600 dark:text-gray-300 outline-1 -outline-offset-1 outline-gray-500 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                        >
                    </div>
                    @error('password')
                        <div class="text-red-400 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                
                <div>
                    <div class="flex items-center justify-between mt-1">
                        <label for="password_confirmation" class="block text-sm/6 font-medium text-gray-500 dark:text-gray-300">{{trans('confirm_password')}}</label>
                    </div>
                    <div>
                        <input 
                            type="password" 
                            name="password_confirmation" 
                            id="password_confirmation" 
                            required 
                            placeholder="Confirm password"
                            class="block w-full rounded-md bg-gray-50 dark:bg-gray-700 px-3 py-1.5 text-base text-gray-600 dark:text-gray-300 outline-1 -outline-offset-1 outline-gray-500 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                        >
                    </div>
                </div>

                <div>
                    <x-buttons.button type="submit" variant="primary" class="block w-full text-center">{{trans('reset_password')}}</x-buttons.button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.main>