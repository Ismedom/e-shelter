<nav class="z-50 backdrop-blur-xl bg-transparent fixed top-0 left-0 right-0  dark:border-gray-700/30  transition-all duration-300">
    <div class="max-w-[80%] mx-auto px-6 sm:px-8">
        <div class="flex justify-between items-center h-20">
            
            <div class="flex items-center space-x-3">
                <div class="w-12 h-12 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-2xl flex items-center justify-center shadow-lg transform hover:scale-105 transition-transform duration-200">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2 2v10z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 21l4-4 4 4"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 17l-4-4 4-4 4 4-4 4z"></path>
                    </svg>
                </div>
                <a href="{{route('home')}}" class="group flex items-center">
                    <span class="text-3xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent hover:from-blue-500 hover:to-indigo-500 transition-all duration-300">
                        Eshelter
                    </span>
                </a>
            </div>

            <div class="hidden md:flex items-center space-x-2">
                <ul class="flex space-x-2">
                    <li>
                        <x-buttons.link 
                            href="{{route('service')}}" 
                            class="nav-link relative px-4 py-2 text-gray-700 bg-transparent dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 font-medium transition-all duration-300 hover:scale-105 group rounded-lg hover:bg-gray-100/50 dark:hover:bg-gray-800/50">
                            <span class="relative z-10">Service</span>
                            <div class="absolute inset-x-0 -bottom-1 h-0.5 bg-gradient-to-r from-blue-600 to-indigo-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 rounded-full"></div>
                        </x-buttons.link>
                    </li>
                    <li>
                        <x-buttons.link 
                            href="{{route('partner')}}" 
                            class="nav-link relative px-4 py-2 text-gray-700 bg-transparent dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 font-medium transition-all duration-300 hover:scale-105 group rounded-lg hover:bg-gray-100/50 dark:hover:bg-gray-800/50">
                            <span class="relative z-10">Partner</span>
                            <div class="absolute inset-x-0 -bottom-1 h-0.5 bg-gradient-to-r from-blue-600 to-indigo-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 rounded-full"></div>
                        </x-buttons.link>
                    </li>
                    <li>
                        <x-buttons.link 
                            href="{{route('features')}}" 
                            class="nav-link relative px-4 py-2 text-gray-700 bg-transparent dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 font-medium transition-all duration-300 hover:scale-105 group rounded-lg hover:bg-gray-100/50 dark:hover:bg-gray-800/50">
                            <span class="relative z-10">Benefits & Features</span>
                            <div class="absolute inset-x-0 -bottom-1 h-0.5 bg-gradient-to-r from-blue-600 to-indigo-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 rounded-full"></div>
                        </x-buttons.link>
                    </li>
                </ul>
            </div>

            <div class="flex items-center space-x-4">
                <button 
                    id="toggleTheme" 
                    class="relative p-3 bg-gray-100/70 dark:bg-gray-800/70 hover:bg-gray-200/70 dark:hover:bg-gray-700/70 border border-gray-300/50 dark:border-gray-600/50 hover:border-blue-400/50 dark:hover:border-blue-500/50 rounded-xl transition-all duration-300 hover:scale-110 hover:shadow-lg hover:shadow-blue-500/20 group cursor-pointer">
                    <svg id="brightIcon"
                         xmlns="http://www.w3.org/2000/svg" 
                         fill="none" 
                         viewBox="0 0 24 24" 
                         stroke-width="1.5" 
                         stroke="currentColor" 
                         class="w-5 h-5 text-yellow-500 group-hover:text-yellow-400 transition-colors duration-300">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                    </svg>
                    <svg id="moonshape"
                         xmlns="http://www.w3.org/2000/svg" 
                         fill="none" 
                         viewBox="0 0 24 24" 
                         stroke-width="1.5" 
                         stroke="currentColor" 
                         class="w-5 h-5 text-gray-600 group-hover:text-blue-300 transition-colors duration-300">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
                    </svg>
                </button>

                <div class="relative py-3">
                    <form id="lang-form" method="POST" action="{{ route('lang.switch') }}">
                        @csrf
                        <select 
                            name="lang" 
                            onchange="document.getElementById('lang-form').submit()"
                            class="appearance-none bg-gray-100/70 dark:bg-gray-800/70 hover:bg-gray-200/70 dark:hover:bg-gray-700/70 text-gray-700 dark:text-gray-200 border border-gray-300/50 dark:border-gray-600/50 hover:border-blue-400/50 dark:hover:border-blue-500/50 rounded-xl px-4 py-2.5 pr-10 text-sm font-medium transition-all duration-300 hover:shadow-lg hover:shadow-blue-500/10 focus:outline-none focus:ring-2 focus:ring-blue-500/50 cursor-pointer">
                            <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>🇺🇸 EN</option>
                            <option value="km" {{ app()->getLocale() == 'km' ? 'selected' : '' }}>🇰🇭 ខ្មែរ</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </form>
                </div>

                <div class="flex items-center space-x-3">
                    @if (Auth::check())
                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <x-buttons.button 
                                type="submit"
                                class="relative px-6 py-2.5 bg-gradient-to-r from-red-500 to-pink-600 hover:from-red-600 hover:to-pink-700 text-white font-medium rounded-xl transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-red-500/25 transform active:scale-95 overflow-hidden group">
                                <span class="relative z-10">Sign Out</span>
                                <div class="absolute inset-0 bg-gradient-to-r from-red-600 to-pink-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            </x-buttons.button>
                        </form>
                    @else
                        <x-buttons.link 
                            href="{{route('login')}}" 
                            class="px-4 py-2.5 bg-transparent text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 font-medium rounded-lg hover:bg-gray-100/50 dark:hover:bg-gray-800/50 transition-all duration-300 hover:scale-105 border border-transparent hover:border-gray-200/50 dark:hover:border-gray-700/50">
                            {{trans('login')}}
                        </x-buttons.link>
                        <x-buttons.link 
                            href="{{route('register')}}" 
                            class="relative px-6 py-2.5 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-medium rounded-lg transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-blue-500/25 transform active:scale-95 overflow-hidden group">
                            <span class="relative z-10">{{trans('register')}}</span>
                            <div class="absolute inset-0 bg-gradient-to-r from-blue-700 to-indigo-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </x-buttons.link>    
                    @endif
                </div>

                <button class="md:hidden p-2 text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-gray-100/50 dark:hover:bg-gray-800/50 rounded-lg transition-all duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        localStorage.getItem('data-theme') !=="dark" ? toggleView('none', 'block') :toggleView('block', 'none')

        function toggle(){
            if(localStorage.getItem('data-theme') !=="dark"){
                document.documentElement.setAttribute('data-theme', 'dark');
                localStorage.setItem('data-theme', 'dark');
                toggleView('block', 'none')
            }else{
                document.documentElement.removeAttribute('data-theme');
                localStorage.removeItem('data-theme');
                toggleView('none', 'block')
            }
        }
        toggleTheme.addEventListener("click", ()=>toggle());   
    });

    function toggleView(display1="none", display2="none"){
        brightIcon.style.display = display1
        moonshape.style.display  = display2
    }
</script>