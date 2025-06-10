<x-layouts.main>
    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-indigo-50 dark:from-gray-900 dark:via-gray-800 dark:to-blue-900 flex">
        @include('auth.branding')

        <div class="flex-1 flex flex-col justify-center px-6 py-8 lg:px-12">
            <div class="mx-auto w-full max-w-md">
                <div class="lg:hidden text-center mb-6">
                    <div class="inline-flex items-center space-x-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-xl flex items-center justify-center">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2V7zm0 0a2 2 0 012-2h6l2 2h6a2 2 0 012 2v2H3V7z"/>
                            </svg>
                        </div>
                        <span class="text-2xl font-bold text-gray-800 dark:text-gray-200">Eshelter</span>
                    </div>
                </div>

                <div class="text-center mb-6">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100">{{trans('signup')}}</h2>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">{{trans('create_account')}}</p>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 p-8">
                    <form class="space-y-5" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="space-y-2">
                            <label for="email" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                {{trans('email')}}
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                                    </svg>
                                </div>
                                <input type="email" 
                                    name="email"
                                    autocomplete="email" 
                                    required 
                                    placeholder="{{trans('enter_your_email')}}"
                                    value="{{ old('email') }}"
                                    class="block w-full pl-10 pr-3 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200">
                            </div>
                            @error('email')
                                <div class="text-red-500 text-sm mt-1 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="space-y-2">
                            <label for="password" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                {{trans('password')}}
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                    </svg>
                                </div>
                                <input type="password" 
                                    name="password"
                                    autocomplete="new-password" 
                                    required 
                                    placeholder="{{trans('create_password')}}"
                                    value="{{ old('password') }}"
                                    class="block w-full pl-10 pr-3 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200">
                            </div>
                            @error('password')
                                <div class="text-red-500 text-sm mt-1 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                {{trans('confirm_password')}}
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <input type="password" 
                                    name="password_confirmation" 
                                    autocomplete="new-password" 
                                    required 
                                    placeholder="{{trans('confirm_your_password')}}"
                                    value="{{ old('password_confirmation') }}"
                                    class="block w-full pl-10 pr-3 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200">
                            </div>
                            @error('password_confirmation')
                                <div class="text-red-500 text-sm mt-1 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <div class="flex items-start space-x-3">
                                <input type="checkbox" 
                                    name="accept"
                                    {{ old('accept') ? 'checked' : '' }}
                                    required
                                    class="mt-1 w-4 h-4 text-indigo-600 bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded focus:ring-indigo-500 dark:focus:ring-indigo-600 focus:ring-2">
                                <label class="text-sm text-gray-600 dark:text-gray-400">
                                    {{trans('terms_agreement')}} 
                                    <a href="#" class="text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300 font-medium">{{trans('terms_of_service')}}</a> 
                                    {{trans('and')}} 
                                    <a href="#" class="text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300 font-medium">{{trans('privacy_policy')}}</a>
                                </label>
                            </div>
                        </div>

                        <div>
                            <button type="submit" 
                                class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-semibold py-3 px-4 rounded-lg transition-all duration-200 transform hover:scale-[1.02] shadow-lg hover:shadow-xl">
                                {{trans('signup')}}
                            </button>
                        </div>
                    </form>

                    <div class="mt-6 text-center">
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            {{trans('already_have_account')}}
                            <a href="{{route('login')}}" 
                               class="font-semibold text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300 transition-colors duration-200">
                                {{trans('login')}}
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.main>