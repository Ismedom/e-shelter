<x-layouts.dashboard>
    <x-layouts.accommodation :accommodation="$accommodation">
        <div class="p-4">
            <div class="mb-6">
                <div class="flex items-center gap-2 mb-1">
                    <a href="{{ route('rooms.index', $accommodation) }}" class="text-blue-600 dark:text-blue-500 hover:underline flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Rooms
                    </a>
                </div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                    @if($rooms->count() > 0)
                        Edit Room Codes
                    @else
                        Generate Rooms
                    @endif
                </h1>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    @if($rooms->count() > 0)
                        Update your room codes
                    @else
                        Create rooms for your accommodation
                    @endif
                </p>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
                @if($rooms->count() > 0)
                    <form action="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-6">
                            <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Update Room Codes</h2>
                        </div>
                        
                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                            @foreach($rooms as $room)
                                <div class="mb-5">
                                    <label for="room_code_{{ $room->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">Room code*</label>
                                    <input type="text" id="room_code_{{ $room->id }}" name="room_code[]" value="{{ old('room_code.' . $loop->index, $room->room_number) }}" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" required />
                                    <input type="hidden" name="room_id[]" value="{{ $room->id }}">
                                    @error('room_code.' . $loop->index)
                                        <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            @endforeach
                        </div>
                        
                        <div class="mt-6">
                            <x-buttons.button variant="primary" type="submit">
                                {{ __('Update Room Codes') }}
                            </x-buttons.button>
                        </div>
                    </form>
                @else
                    <form action="{{ route('rooms.store', $accommodation) }}" method="POST">
                        @csrf
                        <div class="mb-6">
                            <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Room Generation</h2>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Set up parameters to generate rooms for your accommodation</p>
                        </div>
                        
                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                            <div class="mb-5">
                                <label for="floor_count" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">Floor Count*</label>
                                <input type="number" min="1" id="floor_count" name="floor_count" value="{{ old('floor_count') }}" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" required />
                                @error('floor_count')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="mb-5">
                                <label for="rooms_per_floor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">Rooms per Floor*</label>
                                <input type="number" min="1" id="rooms_per_floor" name="rooms_per_floor" value="{{ old('rooms_per_floor') }}" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" required />
                                @error('rooms_per_floor')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="mb-5">
                                <label for="total_room_count" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">Total Rooms*</label>
                                <input type="number" min="1" id="total_room_count" name="total_room_count" value="{{ old('total_room_count') }}" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" required />
                                @error('total_room_count')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">This should match Floor Count × Rooms per Floor</p>
                            </div>
                            
                            <div class="mb-5">
                                <label for="building_code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">Building Code*</label>
                                <input type="text" id="building_code" name="building_code" value="{{ old('building_code') }}" placeholder="e.g. A, B, Main" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" required />
                                @error('building_code')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="mb-5">
                                <label for="building_code_leading" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">Room Numbering Format</label>
                                <div class="flex items-center mt-2">
                                    <input 
                                        type="checkbox" 
                                        id="building_code_leading"
                                        name="building_code_leading"
                                        {{ old('building_code_leading') ? 'checked' : '' }}
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 cursor-pointer"
                                    >
                                    <label for="building_code_leading" class="ml-2 text-sm text-gray-700 dark:text-gray-300">
                                        Prefix room numbers with building code
                                    </label>
                                </div>
                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">e.g. A101, A102 instead of 101, 102</p>
                            </div>
                        </div>
                        
                        <div class="mt-6">
                            <x-buttons.button variant="primary" type="submit">
                                {{ __('Generate Rooms') }}
                            </x-buttons.button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </x-layouts.accommodation>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const floorCount = document.getElementById('floor_count');
            const roomsPerFloor = document.getElementById('rooms_per_floor');
            const totalRoomCount = document.getElementById('total_room_count');
            
            function updateTotalRooms() {
                if (floorCount.value && roomsPerFloor.value) {
                    totalRoomCount.value = parseInt(floorCount.value) * parseInt(roomsPerFloor.value);
                }
            }
            
            if (floorCount && roomsPerFloor && totalRoomCount) {
                floorCount.addEventListener('input', updateTotalRooms);
                roomsPerFloor.addEventListener('input', updateTotalRooms);
            }
        });
    </script>
</x-layouts.dashboard>