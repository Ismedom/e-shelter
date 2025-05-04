<x-layouts.dashboard> 
    <x-layouts.accommodation :accommodation="$accommodation">
        @if($rooms->count() > 0)
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
            @foreach($rooms as $room)
                <div class="mb-5">
                    <label for="room_code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">Room code*</label>
                    <input type="text" id="room_code" name="room_code[]" value="{{ old('room_code',$room->room_number ) }}" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" required />
                    @error('room_code')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            @endforeach
        </div>
        @endif
       <form action="{{route('rooms.store', $accommodation)}}" method="POST">
        @csrf
       
        @if($rooms->count()== 0)
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                <div class="mb-5">
                    <label for="floor_count" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">floor Count*</label>
                    <input type="text" id="floor_count" name="floor_count" value="{{ old('floor_count') }}" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" required />
                    @error('floor_count')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="rooms_per_floor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">Room per floor*</label>
                    <input type="text" id="rooms_per_floor" name="rooms_per_floor" value="{{ old('rooms_per_floor') }}" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" required />
                    @error('rooms_per_floor')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="total_room_count" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">Total Rooms*</label>
                    <input type="text" id="total_room_count" name="total_room_count" value="{{ old('total_room_count') }}" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" required />
                    @error('total_room_count')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="building_code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">Building code*</label>
                    <input type="text" id="building_code" name="building_code" value="{{ old('building_code') }}" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" required />
                    @error('building_code')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>   
                <div class="mb-5">
                    <label for="building_code_leading" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">Do you want number of room leading by "Building code"?</label>
                    <input 
                        type="checkbox" 
                        name="building_code_leading"
                        {{ old('accept') ? 'checked' : '' }}
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 cursor-pointer"
                    >
                </div>   
                
            </div>
        @endif
        <x-buttons.button variant="primary" type="submit" >
            {{ __('Create') }}
        </x-buttons.button>
       </form>
    </x-layouts.accommodation>
</x-layouts.dashboard> 