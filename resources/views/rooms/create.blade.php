<x-layouts.dashboard>
    <x-layouts.accommodation :accommodation="$accommodation">
        <div class="max-w-full mx-auto">
            <x-form.card 
                title="{{ $rooms->count() > 0 ? trans('edit_room_codes') : trans('generate_rooms') }}" 
                description="{{ $rooms->count() > 0 ? trans('update_room_codes') : trans('create_rooms_for_accommodation') }}"
            >
                <div class="flex items-center gap-2 mb-6">
                    <a href="{{ route('rooms.index', $accommodation) }}" class="flex items-center text-blue-600 dark:text-blue-500 hover:underline">
                        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        {{ trans('back_to_rooms') }}
                    </a>
                </div>

                @if($rooms->count() > 0)
                    <form action="" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')
                        
                        <x-form.section 
                            title="{{ trans('update_room_codes') }}"
                            description="{{ trans('modify_existing_room_codes') }}"
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>'
                        >
                            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                                @foreach($rooms as $room)
                                    <x-form.input 
                                        name="room_code[]"
                                        label="{{ trans('room_code') }}"
                                        :value="old('room_code.' . $loop->index, $room->room_number)"
                                        required
                                    />
                                    <input type="hidden" name="room_id[]" value="{{ $room->id }}">
                                @endforeach
                            </div>
                        </x-form.section>

                        <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200 dark:border-gray-700">
                            <x-form.button 
                                type="submit" 
                                variant="primary" 
                                size="lg"
                                class="flex-1 sm:flex-none"
                                icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>'
                            >
                                {{ trans('update_room_codes') }}
                            </x-form.button>
                        </div>
                    </form>
                @else
                    <form action="{{ route('rooms.store', $accommodation) }}" method="POST" class="space-y-6">
                        @csrf
                        
                        <x-form.section 
                            title="{{ trans('room_generation') }}"
                            description="{{ trans('set_up_parameters_to_generate_rooms') }}"
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>'
                        >
                            <x-form.grid columns="3">
                                <x-form.input 
                                    type="number"
                                    name="floor_count"
                                    label="{{ trans('floor_count') }}"
                                    min="1"
                                    :value="old('floor_count')"
                                    required
                                />
                                
                                <x-form.input 
                                    type="number"
                                    name="rooms_per_floor"
                                    label="{{ trans('rooms_per_floor') }}"
                                    min="1"
                                    :value="old('rooms_per_floor')"
                                    required
                                />
                                
                                <x-form.input 
                                    type="number"
                                    name="total_room_count"
                                    label="{{ trans('total_rooms') }}"
                                    min="1"
                                    :value="old('total_room_count')"
                                    required
                                    help-text="{{ trans('total_rooms_help') }}"
                                />
                            </x-form.grid>
                            
                            <x-form.grid columns="2">
                                <x-form.input 
                                    name="building_code"
                                    label="{{ trans('building_code') }}"
                                    placeholder="{{ trans('building_code_placeholder') }}"
                                    :value="old('building_code')"
                                    required
                                />
                                
                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                        {{ trans('room_numbering_format') }}
                                    </label>
                                    <x-form.checkbox 
                                        name="building_code_leading"
                                        label="{{ trans('prefix_room_numbers_with_building_code') }}"
                                        :checked="old('building_code_leading')"
                                        help-text="{{ trans('prefix_room_numbers_help') }}"
                                    />
                                </div>
                            </x-form.grid>
                        </x-form.section>

                        <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200 dark:border-gray-700">
                            <x-form.button 
                                type="submit" 
                                variant="primary" 
                                size="lg"
                                class="flex-1 sm:flex-none"
                                icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>'
                            >
                                {{ trans('generate_rooms') }}
                            </x-form.button>
                            <x-form.button 
                                type="button" 
                                variant="outline" 
                                size="lg"
                                onclick="window.location='{{ route('rooms.index', $accommodation) }}'"
                                icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>'
                            >
                                {{ trans('cancel') }}
                            </x-form.button>
                        </div>
                    </form>
                @endif
            </x-form.card>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const floorCount = document.querySelector('input[name="floor_count"]');
                const roomsPerFloor = document.querySelector('input[name="rooms_per_floor"]');
                const totalRoomCount = document.querySelector('input[name="total_room_count"]');
                
                function updateTotalRooms() {
                    if (floorCount && floorCount.value && roomsPerFloor && roomsPerFloor.value) {
                        totalRoomCount.value = parseInt(floorCount.value) * parseInt(roomsPerFloor.value);
                    }
                }
                
                if (floorCount && roomsPerFloor && totalRoomCount) {
                    floorCount.addEventListener('input', updateTotalRooms);
                    roomsPerFloor.addEventListener('input', updateTotalRooms);
                }
            });
        </script>
    </x-layouts.accommodation>
</x-layouts.dashboard>