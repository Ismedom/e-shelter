
@props(['accommodation'])

<div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-sm hover:shadow-md transition-all duration-200 flex flex-col h-full">
    <div class="relative h-48 overflow-hidden rounded-t-lg">
        @if($accommodation->thumbnail_image)
            <img class="w-full h-full object-cover" 
                 src="{{ asset('storage/'.$accommodation->thumbnail_image) }}" 
                 alt="{{ $accommodation->accommodation_name }}" />
        @else
            <div class="w-full h-full bg-gray-100 dark:bg-gray-700 flex items-center justify-center">
                <svg class="w-12 h-12 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
            </div>
        @endif
        
        <div class="absolute top-3 right-3">
            @if($accommodation->is_active)
                <span class="bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400 text-xs font-semibold px-3 py-1 rounded-full">
                    Active
                </span>
            @else
                <span class="bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400 text-xs font-semibold px-3 py-1 rounded-full">
                    Inactive
                </span>
            @endif
        </div>
    </div>

    <div class="p-6 flex flex-col flex-1">
        <h2 class="mb-2 text-lg font-bold text-gray-900 dark:text-white capitalize">
            {{ $accommodation->accommodation_name }}
        </h2>
        
        <div class="flex items-center text-sm text-gray-600 dark:text-gray-400 mb-3">
            <svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            {{ $accommodation->city }}, {{ $accommodation->country }}
        </div>
        
        <div class="flex flex-wrap gap-2 mb-4">
            @if($accommodation->has_free_wifi)
                <span class="bg-indigo-100 text-indigo-800 dark:bg-indigo-900/30 dark:text-indigo-400 text-xs font-medium px-2 py-1 rounded-md">
                    📶 WiFi
                </span>
            @endif
            @if($accommodation->has_parking)
                <span class="bg-indigo-100 text-indigo-800 dark:bg-indigo-900/30 dark:text-indigo-400 text-xs font-medium px-2 py-1 rounded-md">
                    🚗 Parking
                </span>
            @endif
            @if($accommodation->has_pool)
                <span class="bg-indigo-100 text-indigo-800 dark:bg-indigo-900/30 dark:text-indigo-400 text-xs font-medium px-2 py-1 rounded-md">
                    🏊 Pool
                </span>
            @endif
            @if($accommodation->has_air_conditioning)
                <span class="bg-indigo-100 text-indigo-800 dark:bg-indigo-900/30 dark:text-indigo-400 text-xs font-medium px-2 py-1 rounded-md">
                    ❄️ A/C
                </span>
            @endif
            @if($accommodation->has_restaurant)
                <span class="bg-indigo-100 text-indigo-800 dark:bg-indigo-900/30 dark:text-indigo-400 text-xs font-medium px-2 py-1 rounded-md">
                    🍽️ Restaurant
                </span>
            @endif
            @if($accommodation->has_gym)
                <span class="bg-indigo-100 text-indigo-800 dark:bg-indigo-900/30 dark:text-indigo-400 text-xs font-medium px-2 py-1 rounded-md">
                    💪 Gym
                </span>
            @endif
        </div>
        
        <div class="mt-auto flex gap-3">
            <x-form.button 
                type="button"
                variant="primary" 
                size="md"
                class="flex-1"
                onclick="window.location.href='{{ route('rooms.index', $accommodation) }}'"
                icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>'
            >
                View Details
            </x-form.button>
            
            <x-form.button 
                type="button"
                variant="outline" 
                size="md"
                onclick="window.location.href='{{ route('accommodations.edit', $accommodation->id) }}'"
                icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>'
            >
                <span class="sr-only">Edit</span>
            </x-form.button>
        </div>
    </div>
</div>