<x-layouts.dashboard>
    <x-layouts.accommodation :accommodation="$accommodation">
        <div class="p-4">
            <div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">{{trans('room_types')}}</h1>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">{{trans('manage_room_types')}}</p>
                </div>
                
                <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
                    <div class="relative w-full sm:w-64">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input type="search" id="search-room-types" class="block w-full p-2.5 pl-10 text-sm text-gray-900 border border-gray-300 rounded-md bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{trans('search_room_types')}}">
                    </div>
                    <a href="{{ route('room-types.create', $accommodation) }}" class="px-4 py-2.5 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors flex items-center justify-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Add New Room Type
                    </a>
                </div>
            </div>

            @if(count($room_types??[]) > 0)
                <div class="mb-4 flex flex-wrap gap-2">
                    <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>{{trans('sort_by')}}</option>
                        <option value="name_asc">{{trans('name_asc')}}</option>
                        <option value="name_desc">{{trans('name_desc')}}</option>
                        <option value="price_asc">{{trans('price_low_to_high')}}</option>
                        <option value="price_desc">{{trans('price_high_to_low')}}</option>
                    </select>
                    
                    <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>{{trans('all_currencies')}}</option>
                        <option value="USD">USD</option>
                        <option value="EUR">EUR</option>
                        <option value="GBP">GBP</option>
                    </select>
                    
                    <button type="button" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Apply Filters
                    </button>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead>
                                <tr class="bg-gray-50 dark:bg-gray-700">
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        <button class="flex items-center space-x-1 hover:text-gray-700 dark:hover:text-gray-100 transition-colors">
                                            <span>{{trans('type')}}</span>
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"/>
                                            </svg>
                                        </button>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">{{trans('pricing')}}</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">{{trans('discount')}}</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">{{trans('currency')}}</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">{{trans('image')}}</th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">{{trans('actions')}}</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse ($room_types as $roomType)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-150">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gradient-to-r from-blue-500 to-indigo-600 flex items-center justify-center text-white font-semibold shadow-md">
                                                {{ strtoupper(substr($roomType->type, 0, 1)) }}
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                    {{ $roomType->type }}
                                                </div>
                                                <div class="text-sm text-gray-500 dark:text-gray-400">
                                                    ID: #{{ $roomType->id }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900 dark:text-white">
                                            {{ number_format($roomType->pricing, 2) }}
                                        </div>
                                        @if($roomType->discount > 0)
                                        <div class="text-sm text-gray-500 dark:text-gray-400">
                                            {{ number_format($roomType->pricing * (1 - $roomType->discount/100), 2) }} after discount
                                        </div>
                                        @endif
                                    </td>
                                    
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($roomType->discount > 0)
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                                {{ $roomType->discount }}% OFF
                                            </span>
                                        @else
                                            <span class="text-sm text-gray-400 italic">{{trans('no_discount')}}</span>
                                        @endif
                                    </td>
                                    
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900 dark:text-white">
                                            {{ $roomType->currency }}
                                        </div>
                                    </td>
                                    
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($roomType->image)
                                            <img src="{{ asset('storage/' . $roomType->image) }}" alt="{{ $roomType->type }}" class="w-16 h-12 object-cover rounded-lg shadow-sm">
                                        @else
                                            <div class="w-16 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center">
                                                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                </svg>
                                            </div>
                                        @endif
                                    </td>
                                    
                                    <td class="px-6 py-4">
                                        <div class="flex space-x-2 justify-center">
                                            <a href="{{ route('room-types.edit', [$accommodation, $roomType->id]) }}" class="flex items-center text-blue-600 dark:text-blue-500 hover:underline">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                </svg>
                                                Edit
                                            </a>
                                            <form action="{{ route('room-types.destroy', [$accommodation, $roomType->id]) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    type="button"
                                                    class="flex items-center text-red-600 dark:text-red-500 hover:underline"
                                                    onclick="const el = document.getElementById('deleteRoomTypeModal-{{ $roomType->id }}'); el.classList.remove('hidden'); el.classList.add('flex')"
                                                >
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                        </path>
                                                    </svg>
                                                    Delete
                                                </button>
                                                <x-modal 
                                                    id="deleteRoomTypeModal-{{ $roomType->id }}"
                                                    type="danger"
                                                    title="{{trans('delete_room_type')}}"
                                                    description="{{trans('delete_room_type_description')}}"
                                                    confirmText="{{trans('yes_delete')}}"
                                                    cancelText="{{trans('cancel')}}"
                                                    confirmAction="this.closest('form').submit()"
                                                    showCancel="true"
                                                    isOpen={{false}}
                                                >
                                                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                                                        Are you sure you want to delete the "{{ $roomType->type }}" room type?
                                                        This will permanently remove this room type and may affect associated rooms.
                                                    </p>
                                                </x-modal>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center">
                                            <svg class="w-12 h-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">{{trans('no_room_types_found')}}</h3>
                                            <p class="text-gray-500 dark:text-gray-400">{{trans('create_first_room_type')}}</p>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    @if($room_types->hasPages())
                        <div class="px-6 py-3">
                            {{ $room_types->links() }}
                        </div>
                    @endif
                </div>
            @else
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-8 text-center">
                    <div class="flex flex-col items-center justify-center">
                        <div class="mb-4 p-3 rounded-full bg-blue-50 dark:bg-blue-900/20">
                            <svg class="w-12 h-12 text-blue-500 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">{{trans('no_room_types_found')}}</h2>
                        <p class="text-gray-600 dark:text-gray-400 mb-6 max-w-md">
                            {{trans('room_types_help_text')}}
                        </p>
                        <a href="{{ route('room-types.create', $accommodation) }}" class="px-5 py-2.5 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors flex items-center justify-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Create Your First Room Type
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </x-layouts.accommodation>
</x-layouts.dashboard>