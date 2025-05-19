<x-layouts.dashboard>
    <div class="bg-gray-50 py-8 px-4">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Accommodations</h1>
                <p class="text-gray-500 mt-1">Manage your hotel listings and details.</p>
            </div>
            <x-buttons.link variant="primary" href="{{ route('accommodations.create') }}">
                Add New Hotel
            </x-buttons.link>
        </div>
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
            @if(!$accommodations->isEmpty())
                @foreach ($accommodations as $accommodation)
                <div class="bg-white border border-gray-200 rounded-md shadow hover:shadow-xl transition duration-300 flex flex-col h-full">
                    <div class="relative h-48 overflow-hidden">
                        @if($accommodation->thumbnail_image)
                            <img class="w-full h-full object-cover" src="{{ asset('storage/'.$accommodation->thumbnail_image) }}" alt="{{ $accommodation->accommodation_name }}" />
                        @else
                            <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                <svg class="w-12 h-12 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                        @endif
                        <div class="absolute top-3 right-3">
                            @if($accommodation->is_active)
                                <span class="bg-green-100 text-green-800 text-xs font-semibold px-3 py-1 rounded-full shadow">Active</span>
                            @else
                                <span class="bg-red-100 text-red-800 text-xs font-semibold px-3 py-1 rounded-full shadow">Inactive</span>
                            @endif
                        </div>
                    </div>
                    <div class="p-5 flex flex-col flex-1">
                        <h2 class="mb-2 text-lg font-bold text-gray-900 first-letter:uppercase">{{ $accommodation->accommodation_name }}</h2>
                        <div class="flex items-center text-sm text-gray-600 mb-2">
                            <svg class="w-4 h-4 mr-1 text-blue-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            {{ $accommodation->city }}, {{ $accommodation->country }}
                        </div>
                        <div class="flex flex-wrap gap-2 mb-4">
                            @if($accommodation->has_free_wifi)
                                <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2 py-0.5 rounded">WiFi</span>
                            @endif
                            @if($accommodation->has_parking)
                                <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2 py-0.5 rounded">Parking</span>
                            @endif
                            @if($accommodation->has_pool)
                                <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2 py-0.5 rounded">Pool</span>
                            @endif
                            @if($accommodation->has_air_conditioning)
                                <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2 py-0.5 rounded">A/C</span>
                            @endif
                        </div>
                        <div class="mt-auto flex gap-2">
                            <x-buttons.link href="{{ route('rooms.index', $accommodation) }}" variant="primary" class="w-full flex justify-center items-center">
                                <span>View Details</span>
                                <svg class="w-4 h-4 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                </svg>
                            </x-buttons.link>
                            <x-buttons.link href="{{ route('accommodations.edit', $accommodation->id) }}" 
                                class="inline-flex items-center px-3 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-md hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200">
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                            </x-buttons.link>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-span-full flex flex-col justify-center items-center p-10 bg-white rounded-md shadow">
                    <svg class="mx-auto h-16 w-16 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                    <h3 class="mt-4 text-lg font-semibold text-gray-900">No accommodations found</h3>
                    <p class="mt-2 text-gray-500">Get started by creating a new accommodation.</p>
                    <x-new-hotel href="{{ route('accommodations.create') }}" class="mt-4">
                        Add New Hotel
                    </x-new-hotel>
                </div>
            @endif
        </div>
    </div>
</x-layouts.dashboard>