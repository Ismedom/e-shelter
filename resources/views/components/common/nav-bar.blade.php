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