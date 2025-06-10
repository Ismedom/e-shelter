<x-layouts.dashboard>
    <x-layouts.accommodation :accommodation="$accommodation">
        <div class="p-4">
            <div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">{{trans('rooms')}}</h1>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">{{trans('manage_rooms')}}</p>
                </div>
                
                <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
                    <div class="relative w-full sm:w-64">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input type="search" id="search-rooms" class="block w-full p-2.5 pl-10 text-sm text-gray-900 border border-gray-300 rounded-md bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{trans('search_rooms')}}">
                    </div>
                    <a href="{{ route('rooms.create', $accommodation) }}" class="px-4 py-2.5 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors flex items-center justify-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        {{trans('add_new_rooms')}}
                    </a>
                </div>
            </div>

            @if(count($rooms??[]) > 0)
                <div class="mb-4 flex flex-wrap gap-2">
                    <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>{{trans('sort_by')}}</option>
                        <option value="room_number_asc">{{trans('room_number_low_high')}}</option>
                        <option value="room_number_desc">{{trans('room_number_high_low')}}</option>
                        <option value="floor_asc">{{trans('floor_low_high')}}</option>
                        <option value="floor_desc">{{trans('floor_high_low')}}</option>
                    </select>
                    
                    <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>{{trans('all_status')}}</option>
                        <option value="available">{{trans('available')}}</option>
                        <option value="occupied">{{trans('occupied')}}</option>
                        <option value="maintenance">{{trans('maintenance')}}</option>
                    </select>
                    
                    <button type="button" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        {{trans('apply_filters')}}
                    </button>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead>
                            <tr class="bg-gray-50 dark:bg-gray-700">
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    <button class="flex items-center space-x-1 hover:text-gray-700 dark:hover:text-gray-100 transition-colors">
                                        <span>{{trans('room_number')}}</span>
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"/>
                                        </svg>
                                    </button>
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">{{trans('floor')}}</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">{{trans('building_code')}}</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">{{trans('status')}}</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">{{trans('room_type')}}</th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">{{trans('actions')}}</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse ($rooms as $room)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-150">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        {{-- <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gradient-to-r from-blue-500 to-indigo-600 flex items-center justify-center text-white font-semibold shadow-md">
                                            {{ strtoupper(substr($room->room_number, 0, 1)) }}
                                        </div> --}}
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                {{ $room->room_number }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 dark:text-white">
                                        {{ $room->floor }}
                                    </div>
                                </td>
                                
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 dark:text-white">
                                        {{ $room->building_code }}
                                    </div>
                                </td>
                                
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($room->status == 'available')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                            {{trans('available')}}
                                        </span>
                                    @elseif($room->status == 'booked')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200">
                                            {{trans('booked')}}
                                        </span>
                                    @elseif($room->status == 'occupied')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                            {{trans('occupied')}}
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200">
                                            {{trans('maintenance')}}
                                        </span>
                                    @endif
                                </td>
                                
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 dark:text-white">
                                        {{ $room->roomType->type ?? trans('not_assigned') }}
                                    </div>
                                    @if($room->roomType)
                                    <div class="text-sm text-gray-500 dark:text-gray-400">
                                        {{ $room->roomType->currency ?? '' }} {{ number_format($room->roomType->pricing, 2) ?? '' }}
                                    </div>
                                    @endif
                                </td>
                                
                                <td class="px-6 py-4">
                                    <div class="flex space-x-2 justify-center">
                                        <a href="{{ route('rooms.edit', [$accommodation, $room->id]) }}" class="flex items-center text-blue-600 dark:text-blue-500 hover:underline">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                            {{trans('edit')}}
                                        </a>
                                        <form action="{{ route('rooms.destroy', [$accommodation, $room->id]) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                type="button"
                                                class="flex items-center text-red-600 dark:text-red-500 hover:underline"
                                                onclick="const el = document.getElementById('deleteRoomModal-{{ $room->id }}'); el.classList.remove('hidden'); el.classList.add('flex')"
                                            >
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                    </path>
                                                </svg>
                                                {{trans('delete')}}
                                            </button>
                                            <x-modal 
                                                id="deleteRoomModal-{{ $room->id }}"
                                                type="danger"
                                                title="{{trans('delete_room')}}"
                                                description="{{trans('delete_room_confirmation', ['room_number' => $room->room_number])}}"
                                                confirmText="{{trans('delete')}}"
                                                cancelText="{{trans('cancel')}}"
                                                confirmAction="this.closest('form').submit()"
                                                showCancel="true"
                                                isOpen={{false}}
                                            >
                                                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                                                    {{trans('delete_room_confirmation', ['room_number' => $room->room_number])}}
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
                                        <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">{{trans('no_rooms_found')}}</h3>
                                        <p class="text-gray-500 dark:text-gray-400">{{trans('add_first_room')}}</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    </div>
                    
                    @if($rooms->hasPages())
                        <div class="px-6 py-3">
                            {{ $rooms->links() }}
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
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">{{trans('no_rooms_found')}}</h2>
                        <p class="text-gray-600 dark:text-gray-400 mb-6 max-w-md">
                            {{trans('add_first_room')}}
                        </p>
                        <a href="{{ route('rooms.create', $accommodation) }}" class="px-5 py-2.5 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors flex items-center justify-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            {{trans('create_rooms')}}
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </x-layouts.accommodation>
</x-layouts.dashboard>