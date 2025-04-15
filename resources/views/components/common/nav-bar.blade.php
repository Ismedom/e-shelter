<nav>
    <div class="flex justify-between items-center px-4 py-2 bg-gray-800">
        <div>
            <a href="{{route('home')}}" class="flex items-center">
                <span class="self-center text-2xl font-semibold whitespace-nowrap text-gray-300">Eshelter</span>
            </a>
        </div>

        <div>
            <ul class="flex flex-row space-x-4">
                <li>
                    <x-buttons.link href="{{route('service')}}" class="text-gray-300 hover:text-gray-400">Service</x-buttons.link>
                </li>
                <li>
                    <x-buttons.link href="{{route('partner')}}" class="text-gray-300 hover:text-gray-400">Partner</x-buttons.link>
                </li>
                <li>
                    <x-buttons.link href="{{route('features')}}" class="text-gray-300 hover:text-gray-400">Benefits & Features</x-buttons.link>
                </li>
            </ul>
        </div>

        <div class="flex gap-2">
            <button id="toggleTheme" class="cursor-pointer bg-gray-700 text-gray-50 px-3 rounded-md">
                   <svg id="brightIcon"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                    </svg>
                    <svg id="moonshape"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
                    </svg>
            </button>
            <div class="relative inline-block text-left">
                <form id="lang-form" method="POST" action="{{ route('lang.switch') }}">
                    @csrf
                    <select name="lang" onchange="document.getElementById('lang-form').submit()"
                            class="bg-gray-800 text-gray-300 border border-gray-600 rounded px-2 py-1 text-sm">
                        <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>EN</option>
                        <option value="km" {{ app()->getLocale() == 'km' ? 'selected' : '' }}>ខ្មែរ</option>
                    </select>
                </form>
            </div>

            <div>
                @if (Auth::check())
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <x-buttons.button type="submit">
                            Sign Out
                        </x-buttons.button>
                    </form>
                @else
                    <x-buttons.link href="{{route('login')}}" class="text-gray-300 hover:text-gray-400">{{trans('login')}}</x-buttons.link>
                    <x-buttons.link href="{{route('register')}}" class="text-gray-300 hover:text-gray-400">{{trans('register')}}</x-buttons.link>    
                @endif

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