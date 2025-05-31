<x-layouts.dashboard>
    <x-layouts.accommodation :accommodation="$accommodation">
        <div class="min-h-screen bg-gray-50 py-8">
            <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="mb-8">
                    <nav class="flex mb-4" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 md:space-x-3">
                            <li class="inline-flex items-center">
                                <a href="{{ route('dashboard.index') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                                    <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                                    </svg>
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <div class="flex items-center">
                                    <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                    </svg>
                                    <a href="{{ route('rooms.index', $accommodation) }}"class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2">Rooms</a>
                                </div>
                            </li>
                            <li aria-current="page">
                                <div class="flex items-center">
                                    <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                    </svg>
                                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Edit Room</span>
                                </div>
                            </li>
                        </ol>
                    </nav>
                    
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900">Edit Room</h1>
                            <p class="mt-2 text-sm text-gray-600">Update room information and settings</p>
                        </div>
                        <div class="flex items-center space-x-3">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                Room #{{ $room->room_number }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Form Card -->
                <div class="bg-white shadow-sm rounded-lg border border-gray-200">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h2 class="text-lg font-semibold text-gray-900">Room Details</h2>
                        <p class="text-sm text-gray-600">Please update the room information below</p>
                    </div>

                    <form action="{{ route('rooms.update', [$room->id, $accommodation]) }}" method="POST" class="p-6">
                        @csrf
                        @method('PUT')
                        <div class="mb-6">
                            <label for="accommodation_id" class="block mb-2 text-sm font-medium text-gray-900">
                                Accommodation <span class="text-red-500">*</span>
                            </label>
                            {{-- <select id="accommodation_id" name="accommodation_id" required 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('accommodation_id') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror">
                                <option value="">Select an accommodation</option>
                                @foreach($accommodations as $accommodation)
                                    <option value="{{ $accommodation->id }}" 
                                            {{ old('accommodation_id', $room->accommodation_id) == $accommodation->id ? 'selected' : '' }}>
                                        {{ $accommodation->name }}
                                    </option>
                                @endforeach
                            </select> --}}
                            @error('accommodation_id')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="room_number" class="block mb-2 text-sm font-medium text-gray-900">
                                Room Number <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z"/>
                                    </svg>
                                </div>
                                <input type="text" id="room_number" name="room_number" 
                                    value="{{ old('room_number', $room->room_number) }}" required
                                    placeholder="e.g., 101, A-205, Suite 301"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 @error('room_number') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror">
                            </div>
                            @error('room_number')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-sm text-gray-500">Enter the unique room identifier</p>
                        </div>

                        <div class="mb-6">
                            <label for="status" class="block mb-2 text-sm font-medium text-gray-900">
                                Room Status
                            </label>
                            <select id="status" name="status" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('status') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror">
                                <option value="">Select status (optional)</option>
                                <option value="available" {{ old('status', $room->status) == 'available' ? 'selected' : '' }}>
                                    Available
                                </option>
                                <option value="occupied" {{ old('status', $room->status) == 'occupied' ? 'selected' : '' }}>
                                    Occupied
                                </option>
                                <option value="maintenance" {{ old('status', $room->status) == 'maintenance' ? 'selected' : '' }}>
                                    Under Maintenance
                                </option>
                                <option value="out_of_order" {{ old('status', $room->status) == 'out_of_order' ? 'selected' : '' }}>
                                    Out of Order
                                </option>
                                <option value="cleaning" {{ old('status', $room->status) == 'cleaning' ? 'selected' : '' }}>
                                    Cleaning
                                </option>
                            </select>
                            @error('status')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-sm text-gray-500">Current operational status of the room</p>
                        </div>

                        <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                            <div class="flex items-center space-x-4">
                                <a href="{{ route('rooms.index', $accommodation) }}" 
                                class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 transition-colors duration-200">
                                    Cancel
                                </a>
                                <a href="{{ route('rooms.show', [$room->id, $accommodation]) }}" 
                                class="text-sm font-medium text-blue-600 hover:text-blue-800 hover:underline">
                                    View Room Details
                                </a>
                            </div>
                            
                            <div class="flex items-center space-x-3">
                                <button type="submit" 
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none transition-colors duration-200">
                                    <svg class="w-4 h-4 mr-2 inline" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    Update Room
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="w-5 h-5 text-blue-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-blue-800">Room Information</h3>
                            <div class="mt-2 text-sm text-blue-700">
                                <p>Last updated: {{ $room->updated_at->format('M d, Y \a\t g:i A') }}</p>
                                <p>Created: {{ $room->created_at->format('M d, Y \a\t g:i A') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-layouts.accommodation>
    
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        const firstInput = document.querySelector('input[type="text"]');
        if (firstInput) {
            firstInput.focus();
        }
        
        const form = document.querySelector('form');
        const submitButton = form.querySelector('button[type="submit"]');
        
        form.addEventListener('submit', function() {
            submitButton.innerHTML = `
                <svg class="animate-spin -ml-1 mr-3 h-4 w-4 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Updating...
            `;
            submitButton.disabled = true;
        });
    });
</script>
</x-layouts.dashboard>





