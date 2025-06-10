<x-layouts.dashboard>  
    <div class="mb-4">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-4 mb-6">
            <form method="GET" action="{{ route('users.index') }}" class="space-y-4" id="searchForm">
                @csrf
                <div class="flex flex-col sm:flex-row gap-4">
                    <div class="flex-1">
                        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">{{trans('search')}}</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                            <input 
                                type="search" 
                                id="default-search" 
                                name="search"
                                class="block w-full h-10 px-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                                placeholder="{{trans('search_users')}}" 
                                value="{{ request()->query('search', '') }}"
                            />
                            @if(request()->query('search'))
                            <button type="button" 
                                    onclick="clearSearch()"
                                    class="absolute inset-y-0 end-0 flex items-center pe-3 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                            @endif
                        </div>
                    </div>

                    <div class="flex gap-2">
                        <button type="submit" 
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 transition-all duration-200 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-4 h-4 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-4.35-4.35"/>
                                <circle cx="10" cy="10" r="7"/>
                            </svg>
                            Search
                        </button>

                        @if(request()->hasAny(['search', 'data_start', 'data_end', 'status']) && (request()->query('search') || request()->query('data_start') || request()->query('data_end') || (request()->query('status') && request()->query('status') !== 'all')))
                        <button type="button" 
                                onclick="clearAllFilters()"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:ring-4 focus:ring-gray-200 transition-all duration-200 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-700">
                            <svg class="w-4 h-4 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                            </svg>
                            Clear All
                        </button>
                        @endif

                        <button type="button" 
                                onclick="toggleAdvancedFilters()"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:ring-4 focus:ring-gray-200 transition-all duration-200 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-700">
                            <svg class="w-4 h-4 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"/>
                            </svg>
                            Advanced Filters
                            <svg class="w-4 h-4 ms-1 transition-transform duration-200" id="filterIcon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>

                        <!-- Export Button -->
                        <button type="button" 
                                onclick="exportUsers()"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-green-700 bg-green-50 border border-green-200 rounded-lg hover:bg-green-100 focus:ring-4 focus:ring-green-200 transition-all duration-200 dark:bg-green-900/20 dark:text-green-400 dark:border-green-800 dark:hover:bg-green-900/30">
                            <svg class="w-4 h-4 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            Export
                        </button>
                    </div>
                </div>

                <div id="advancedFilters" 
                    class="border-t border-gray-200 dark:border-gray-700 pt-4 transition-all duration-300 transform {{ request()->hasAny(['data_start', 'data_end', 'status']) && (request()->query('data_start') || request()->query('data_end') || (request()->query('status') && request()->query('status') !== 'all')) ? 'opacity-100 max-h-96' : 'hidden opacity-0 max-h-0' }}">
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                {{ trans('date_range') }}
                            </label>
                            <div class="flex items-center gap-2">
                                <div class="flex-1">
                                    <x-input.date-picker 
                                        placeholder="{{trans('start_date')}}" 
                                        class="w-full h-12"
                                        name="data_start" 
                                        value="{{ request()->query('data_start', '') }}"
                                    />
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" 
                                    fill="none" 
                                    viewBox="0 0 24 24" 
                                    stroke-width="1.5" 
                                    stroke="currentColor"
                                    class="w-4 h-4 text-gray-400 flex-shrink-0">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                </svg>
                                <div class="flex-1">
                                    <x-input.date-picker 
                                        placeholder="{{trans('end_date')}}" 
                                        class="w-full h-12" 
                                        name="data_end" 
                                        value="{{ request()->query('data_end', '') }}"
                                    />
                                </div>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                {{ trans('status') }}
                            </label>
                            <x-form.select  
                                name="status" 
                                placeholder="{{trans('select_status')}}"
                                class="h-10"
                                icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'
                                :options="[
                                    ['value' => 'all', 'name' => trans('all_status')],
                                    ['value' => 'active', 'name' => trans('active')],
                                    ['value' => 'inactive', 'name' => trans('inactive')]
                                ]"
                                :selected="request()->query('status', 'all')"
                                value="{{request()->query('status', 'all')}}"
                            />
                        </div>

                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                                {{ trans('quick_filters') }}
                            </label>
                            <div class="flex flex-wrap gap-2">
                                <button type="button" 
                                        onclick="setDateRange('today')"
                                        class="px-3 py-1.5 text-xs font-medium text-gray-600 bg-gray-100 rounded-full hover:bg-blue-100 hover:text-blue-700 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-blue-900/30 dark:hover:text-blue-400 transition-all duration-200">
                                    {{ trans('today') }}
                                </button>
                                <button type="button" 
                                        onclick="setDateRange('week')"
                                        class="px-3 py-1.5 text-xs font-medium text-gray-600 bg-gray-100 rounded-full hover:bg-blue-100 hover:text-blue-700 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-blue-900/30 dark:hover:text-blue-400 transition-all duration-200">
                                    {{ trans('this_week') }}
                                </button>
                                <button type="button" 
                                        onclick="setDateRange('month')"
                                        class="px-3 py-1.5 text-xs font-medium text-gray-600 bg-gray-100 rounded-full hover:bg-blue-100 hover:text-blue-700 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-blue-900/30 dark:hover:text-blue-400 transition-all duration-200">
                                    {{ trans('this_month') }}
                                </button>
                                <button type="button" 
                                        onclick="setDateRange('year')"
                                        class="px-3 py-1.5 text-xs font-medium text-gray-600 bg-gray-100 rounded-full hover:bg-blue-100 hover:text-blue-700 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-blue-900/30 dark:hover:text-blue-400 transition-all duration-200">
                                    {{ trans('this_year') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                @if(request()->hasAny(['search', 'data_start', 'data_end', 'status']) && (request()->query('search') || request()->query('data_start') || request()->query('data_end') || (request()->query('status') && request()->query('status') !== 'all')))
                <div class="flex flex-wrap items-center gap-2 pt-3 border-t border-gray-200 dark:border-gray-700">
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300 flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.707A1 1 0 013 7V4z"/>
                        </svg>
                        {{ trans('active_filters') }}
                    </span>
                    
                    @if(request()->query('search'))
                    <span class="inline-flex items-center px-2.5 py-1 text-xs font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900/30 dark:text-blue-300 animate-in fade-in-0 slide-in-from-left-1">
                        {{ trans('search') }}: "{{ Str::limit(request()->query('search'), 20) }}"
                        <button type="button" onclick="clearFilter('search')" class="ml-1.5 text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-200 transition-colors">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z"/>
                            </svg>
                        </button>
                    </span>
                    @endif

                    @if(request()->query('data_start') || request()->query('data_end'))
                    <span class="inline-flex items-center px-2.5 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full dark:bg-green-900/30 dark:text-green-300 animate-in fade-in-0 slide-in-from-left-2">
                        Date: {{ request()->query('data_start', 'Start') }} → {{ request()->query('data_end', 'End') }}
                        <button type="button" onclick="clearDateFilters()" class="ml-1.5 text-green-600 hover:text-green-800 dark:text-green-400 dark:hover:text-green-200 transition-colors">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z"/>
                            </svg>
                        </button>
                    </span>
                    @endif

                    @if(request()->query('status') && request()->query('status') !== 'all')
                    <span class="inline-flex items-center px-2.5 py-1 text-xs font-medium text-purple-800 bg-purple-100 rounded-full dark:bg-purple-900/30 dark:text-purple-300 animate-in fade-in-0 slide-in-from-left-3">
                        Status: {{ ucfirst(request()->query('status')) }}
                        <button type="button" onclick="clearFilter('status')" class="ml-1.5 text-purple-600 hover:text-purple-800 dark:text-purple-400 dark:hover:text-purple-200 transition-colors">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z"/>
                            </svg>
                        </button>
                    </span>
                    @endif
                </div>
                @endif
            </form>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-xl overflow-hidden shadow-sm border border-gray-200 dark:border-gray-700">
        <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-700/50">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Users</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Showing {{ $users->firstItem() ?? 0 }} to {{ $users->lastItem() ?? 0 }} of {{ $users->total() }} users
                    </p>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="text-sm text-gray-600 dark:text-gray-400">
                        <span class="inline-flex items-center">
                            <span class="w-2 h-2 bg-green-500 rounded-full mr-1"></span>
                            {{ $users->where('status', 'active')->count() }} Active
                        </span>
                    </div>
                    <div class="text-sm text-gray-600 dark:text-gray-400">
                        <span class="inline-flex items-center">
                            <span class="w-2 h-2 bg-red-500 rounded-full mr-1"></span>
                            {{ $users->where('status', 'inactive')->count() }} Inactive
                        </span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead>
                    <tr class="bg-gray-50 dark:bg-gray-700">
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            <button class="flex items-center space-x-1 hover:text-gray-700 dark:hover:text-gray-100 transition-colors">
                                <span>User</span>
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"/>
                                </svg>
                            </button>
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Contact</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Status</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Location</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            <button class="flex items-center space-x-1 hover:text-gray-700 dark:hover:text-gray-100 transition-colors">
                                <span>Joined</span>
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"/>
                                </svg>
                            </button>
                        </th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse ($users as $user)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-150">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gradient-to-r from-blue-500 to-indigo-600 flex items-center justify-center text-white font-semibold shadow-md">
                                    {{ strtoupper(substr($user->first_name ?? $user->email ?? 'U', 0, 1)) }}
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900 dark:text-white">
                                        @if ($user->first_name || $user->last_name)
                                            {{ $user->first_name ?? '' }} {{ $user->last_name ?? '' }}
                                        @else
                                            <span class="text-gray-500 dark:text-gray-400 italic">{{trans('no_name_provided')}}</span>
                                        @endif
                                    </div>
                                    <div class="text-sm text-gray-500 dark:text-gray-400">
                                        ID: #{{ $user->id }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900 dark:text-white">{{ $user->email }}</div>
                            <div class="text-sm text-gray-500 dark:text-gray-400">
                                @if($user->phone_number)
                                    {{ $user->phone_number }}
                                @else
                                    <span class="italic">{{trans('no_phone')}}</span>
                                @endif
                            </div>
                        </td>
                        
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($user->status === 'active')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-200">
                                    <span class="w-2 h-2 mr-1.5 rounded-full bg-green-500 animate-pulse"></span>
                                    Active
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-200">
                                    <span class="w-2 h-2 mr-1.5 rounded-full bg-red-500"></span>
                                    Inactive
                                </span>
                            @endif
                        </td>
                        
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-1.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                {{ $user->province ?? 'Unknown location' }}
                            </div>
                        </td>
                        
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">
                            <div class="flex flex-col">
                                <span class="font-medium">{{ $user->created_at->format('M d, Y') }}</span>
                                <span class="text-xs text-gray-500 dark:text-gray-400">{{ $user->created_at->diffForHumans() }}</span>
                            </div>
                        </td>
                        
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                            <div class="relative inline-block text-left dropdown">
                                <button onclick="toggleDropdown(this)" class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-gray-100 dark:bg-gray-700 text-gray-500 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z">
                                        </path>
                                    </svg>
                                </button>
                                <div class="dropdown-menu hidden origin-top-right absolute right-0 mt-2 w-48 rounded-lg shadow-lg bg-white dark:bg-gray-800 ring-1 ring-gray-200 dark:ring-gray-700 focus:outline-none z-50 transform transition-all ease-out duration-200 opacity-0 scale-95 overflow-hidden">
                                    <div class="divide-y divide-gray-100 dark:divide-gray-700">
                                        <div class="py-1">
                                            <a href="" class="group flex items-center px-3 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 dark:hover:from-blue-900/20 dark:hover:to-blue-800/20 transition-all duration-200">
                                                <div class="w-2 h-2 bg-blue-500 rounded-full mr-3 opacity-0 group-hover:opacity-100 transition-opacity duration-200"></div>
                                                View Profile
                                            </a>
                                            <a href="" class="group flex items-center px-3 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gradient-to-r hover:from-green-50 hover:to-green-100 dark:hover:from-green-900/20 dark:hover:to-green-800/20 transition-all duration-200">
                                                <div class="w-2 h-2 bg-green-500 rounded-full mr-3 opacity-0 group-hover:opacity-100 transition-opacity duration-200"></div>
                                                Edit User
                                            </a>
                                            <button onclick="toggleUserStatus({{ $user->id }}, '{{ $user->status }}')" class="group flex items-center w-full px-3 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gradient-to-r hover:from-yellow-50 hover:to-yellow-100 dark:hover:from-yellow-900/20 dark:hover:to-yellow-800/20 transition-all duration-200">
                                                <div class="w-2 h-2 bg-yellow-500 rounded-full mr-3 opacity-0 group-hover:opacity-100 transition-opacity duration-200"></div>
                                                {{ $user->status === 'active' ? 'Deactivate' : 'Activate' }}
                                            </button>
                                        </div>
                                        <div class="py-1">
                                            <button onclick="deleteUser({{ $user->id }})" class="group flex items-center w-full px-3 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-gradient-to-r hover:from-red-50 hover:to-red-100 dark:hover:from-red-900/20 dark:hover:to-red-800/20 transition-all duration-200">
                                                <div class="w-2 h-2 bg-red-500 rounded-full mr-3 opacity-0 group-hover:opacity-100 transition-opacity duration-200"></div>
                                                Delete User
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center">
                                <svg class="w-12 h-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 009.586 13H7"/>
                                </svg>
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">{{trans('no_users_found')}}</h3>
                                <p class="text-gray-500 dark:text-gray-400">{{trans('try_adjusting_search_or_filter_criteria')}}</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($users->hasPages())
        <div class="px-6 py-4 bg-gray-50 dark:bg-gray-700/50 border-t border-gray-200 dark:border-gray-700">
            {{ $users->appends(request()->query())->links() }}
        </div>
        @endif
    </div>

    <script>
        function toggleAdvancedFilters() {
            const filters = document.getElementById('advancedFilters');
            const icon = document.getElementById('filterIcon');
            
            if (filters.classList.contains('hidden')) {
                filters.classList.remove('hidden', 'opacity-0', 'max-h-0');
                filters.classList.add('opacity-100', 'max-h-96');
                icon.style.transform = 'rotate(180deg)';
            } else {
                filters.classList.remove('opacity-100', 'max-h-96');
                filters.classList.add('opacity-0', 'max-h-0');
                icon.style.transform = 'rotate(0deg)';
                setTimeout(() => {
                    filters.classList.add('hidden');
                }, 300);
            }
        }

        function clearAllFilters() {
            window.location.href = '{{ route("users.index") }}';
        }

        function clearFilter(filterName) {
            const url = new URL(window.location);
            url.searchParams.delete(filterName);
            window.location.href = url.toString();
        }

        function clearSearch() {
            document.getElementById('default-search').value = '';
            clearFilter('search');
        }

        function clearDateFilters() {
            const url = new URL(window.location);
            url.searchParams.delete('data_start');
            url.searchParams.delete('data_end');
            window.location.href = url.toString();
        }

        function setDateRange(range) {
            const today = new Date();
            const startInput = document.querySelector('input[name="data_start"]');
            const endInput = document.querySelector('input[name="data_end"]');
            
            let startDate, endDate;
            
            switch(range) {
                case 'today':
                    startDate = endDate = today.toISOString().split('T')[0];
                    break;
                case 'week':
                    const weekStart = new Date(today.setDate(today.getDate() - today.getDay()));
                    startDate = weekStart.toISOString().split('T')[0];
                    endDate = new Date().toISOString().split('T')[0];
                    break;
                case 'month':
                    startDate = new Date(today.getFullYear(), today.getMonth(), 1).toISOString().split('T')[0];
                    endDate = new Date().toISOString().split('T')[0];
                    break;
                case 'year':
                    startDate = new Date(today.getFullYear(), 0, 1).toISOString().split('T')[0];
                    endDate = new Date().toISOString().split('T')[0];
                    break;
            }
            
            if (startInput) startInput.value = startDate;
            if (endInput) endInput.value = endDate;
            
            setTimeout(() => {
                document.getElementById('searchForm').submit();
            }, 100);
        }

        function exportUsers() {
            const params = new URLSearchParams(window.location.search);
            params.set('export', 'csv');
            window.location.href = `{{ route('users.index') }}?${params.toString()}`;
        }

        function toggleUserStatus(userId, currentStatus) {
            
        }

        function deleteUser(userId) {
            toggleUserStatus()
        }

        function toggleDropdown(button) {
            const dropdown = button.nextElementSibling;
            
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                if (menu !== dropdown) {
                    menu.classList.add('hidden');
                    menu.classList.remove('opacity-100', 'scale-100');
                    menu.classList.add('opacity-0', 'scale-95');
                }
            });
            
            if (dropdown.classList.contains('hidden')) {
                dropdown.classList.remove('hidden');
                setTimeout(() => {
                    dropdown.classList.remove('opacity-0', 'scale-95');
                    dropdown.classList.add('opacity-100', 'scale-100');
                }, 10);
            } else {
                dropdown.classList.remove('opacity-100', 'scale-100');
                dropdown.classList.add('opacity-0', 'scale-95');
                setTimeout(() => {
                    dropdown.classList.add('hidden');
                }, 200);
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('searchForm');
            const selects = form.querySelectorAll('select');
            const dateInputs = form.querySelectorAll('input[datepicker]');
            
            selects.forEach(select => {
                select.addEventListener('change', function() {
                    setTimeout(() => form.submit(), 100);
                });
            });
            
            dateInputs.forEach(input => {
                input.addEventListener('changeDate', function() {
                    setTimeout(() => form.submit(), 100);
                });
            });
            
            @if(request()->hasAny(['data_start', 'data_end', 'status']) && (request()->query('data_start') || request()->query('data_end') || (request()->query('status') && request()->query('status') !== 'all')))
            const filters = document.getElementById('advancedFilters');
            const icon = document.getElementById('filterIcon');
            filters.classList.remove('hidden', 'opacity-0', 'max-h-0');
            filters.classList.add('opacity-100', 'max-h-96');
            icon.style.transform = 'rotate(180deg)';
            @endif
            
            document.addEventListener('click', function(e) {
                if (!e.target.closest('.dropdown')) {
                    document.querySelectorAll('.dropdown-menu').forEach(menu => {
                        menu.classList.add('hidden');
                        menu.classList.remove('opacity-100', 'scale-100');
                        menu.classList.add('opacity-0', 'scale-95');
                    });
                }
            });

            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    document.querySelectorAll('.dropdown-menu').forEach(menu => {
                        menu.classList.add('hidden');
                        menu.classList.remove('opacity-100', 'scale-100');
                        menu.classList.add('opacity-0', 'scale-95');
                    });
                }
            });
        });


    </script>
</x-layouts.dashboard>