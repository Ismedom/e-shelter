@props([
    'accommodation' => null, 
])

<div>
    <div class="border-b border-gray-200 dark:border-gray-700 mb-5">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">
            <li class="me-2">
                <a href="{{ route('rooms.index', $accommodation) }}"
                    class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg group
                    {{ request()->routeIs('accommodation') ? 'text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500' : 'border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300' }}">
                    
                    <svg class="w-4 h-4 me-2 {{ request()->routeIs('accommodation') ? 'text-blue-600 dark:text-blue-500' : 'text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300' }}" 
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <rect x="2" y="4" width="20" height="16" rx="2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M2 10h20" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M7 15h.01" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M11 15h.01" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Rooms
                </a>
            </li>
            <li class="me-2">
                <a href="{{route('room-types.index', $accommodation)}}"
                    class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg group
                    {{ request()->routeIs('room-type') ? 'text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500' : 'border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300' }}">
                    
                    <svg class="w-4 h-4 me-2 {{ request()->routeIs('room-type') ? 'text-blue-600 dark:text-blue-500' : 'text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300' }}" 
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 6a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M3 10h18" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M16 14h2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M16 18h2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M7 14h6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Room Type
                </a>
            </li>
            <li class="me-2">
                <a href=""
                    class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg group
                    {{ request()->routeIs('materials') ? 'text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500' : 'border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300' }}">
                    
                    <svg class="w-4 h-4 me-2 {{ request()->routeIs('materials') ? 'text-blue-600 dark:text-blue-500' : 'text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300' }}" 
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 17h2m4 0h14" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M2 12h4m4 0h12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M2 7h6m4 0h10" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Materials
                </a>
            </li>
            <li class="me-2">
                <a href=""
                    class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg group
                    {{ request()->routeIs('dashboard') ? 'text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500' : 'border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300' }}">
                    
                    <svg class="w-4 h-4 me-2 {{ request()->routeIs('dashboard') ? 'text-blue-600 dark:text-blue-500' : 'text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300' }}" 
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 8v4l3 3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <circle cx="12" cy="12" r="10" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Features
                </a>
            </li>
            <li class="me-2">
                <a href=""
                    class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg group
                    {{ request()->routeIs('staff') ? 'text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500' : 'border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300' }}">
                    
                    <svg class="w-4 h-4 me-2 {{ request()->routeIs('staff') ? 'text-blue-600 dark:text-blue-500' : 'text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300' }}" 
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <circle cx="9" cy="7" r="4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Staff
                </a>
            </li>
            <li class="me-2">
                <a href=""
                    class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg group
                    {{ request()->routeIs('settings') ? 'text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500' : 'border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300' }}">
                    
                    <svg class="w-4 h-4 me-2 {{ request()->routeIs('settings') ? 'text-blue-600 dark:text-blue-500' : 'text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300' }}" 
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Settings
                </a>
            </li>
        </ul>
    </div>
    {{ $slot }}
</div>
