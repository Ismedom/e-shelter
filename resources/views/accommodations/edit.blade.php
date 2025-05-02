<x-layouts.dashboard> 
        <h2 class="text-2xl font-bold mb-4 mt-6 text-gray-900 dark:text-gray-200">Edit Accommodation</h2>
        <form class="px-6 py-6 pb-8 sm:pr-8 bg-white dark:bg-gray-800 rounded-md shadow-md" method="POST" action="{{ route('accommodations.update', $accommodation->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-gray-200 border-b pb-2">Basic Information</h3>
                
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="mb-5">
                        <label for="accommodation_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">Accommodation Name*</label>
                        <input type="text" id="accommodation_name" name="accommodation_name" value="{{ old('accommodation_name', $accommodation->accommodation_name) }}" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" required />
                        @error('accommodation_name')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="accommodation_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">Accommodation Type</label>
                        <x-input.select 
                            name="accommodation_type"
                            :value="old('accommodation_type', $accommodation->accommodation_type)"
                            :data="[
                                ['value' => '', 'name' => 'Select type'],
                                ['value' => 'Hotel', 'name' => 'Hotel'],
                                ['value' => 'Resort', 'name' => 'Resort'],
                                ['value' => 'Apartment', 'name' => 'Apartment'],
                                ['value' => 'Villa', 'name' => 'Villa'],
                                ['value' => 'Cottage', 'name' => 'Cottage'],
                                ['value' => 'Hostel', 'name' => 'Hostel'],
                                ['value' => 'Guesthouse', 'name' => 'Guesthouse']
                            ]"
                        />
                        @error('accommodation_type')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
    
            <div class="mb-6">
                <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-gray-200 border-b pb-2">Location Details</h3>
                
                <div class="mb-5">
                    <label for="accommodation_address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">Address*</label>
                    <input type="text" id="accommodation_address" name="accommodation_address" value="{{ old('accommodation_address', $accommodation->accommodation_address) }}" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" required />
                    @error('accommodation_address')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="mb-5">
                        <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">City*</label>
                        <input type="text" id="city" name="city" value="{{ old('city', $accommodation->city) }}" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" required />
                        @error('city')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="state_province" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">State/Province</label>
                        <input type="text" id="state_province" name="state_province" value="{{ old('state_province', $accommodation->state_province) }}" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" />
                        @error('state_province')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="mb-5">
                        <label for="postal_code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">Postal Code</label>
                        <input type="text" id="postal_code" name="postal_code" value="{{ old('postal_code', $accommodation->postal_code) }}" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" />
                        @error('postal_code')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="country" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">Country*</label>
                        <x-input.select 
                            name="country"
                            :value="old('country', $accommodation->country)"
                            :data="[
                                ['value' => '', 'name' => 'Select country'],
                                ['value' => 'Cambodia', 'name' => 'Cambodia'],
                                ['value' => 'Indonesia', 'name' => 'Indonesia'],
                                ['value' => 'Malaysia', 'name'  => 'Malaysia'],
                                ['value' => 'Singapore', 'name' => 'Singapore'],
                                ['value' => 'Thailand', 'name'  => 'Thailand']
                            ]"
                        />
                        @error('country')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
        
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="mb-5">
                        <label for="latitude" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">Latitude</label>
                        <input type="text" id="latitude" name="latitude" value="{{ old('latitude', $accommodation->latitude) }}" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" placeholder="e.g. -6.2088" />
                        @error('latitude')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="longitude" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">Longitude</label>
                        <input type="text" id="longitude" name="longitude" value="{{ old('longitude', $accommodation->longitude) }}" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" placeholder="e.g. 106.8456" />
                        @error('longitude')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        
            <div class="mb-6">
                <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-gray-200 border-b pb-2">Contact Information</h3>
                
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="mb-5">
                        <label for="contact_email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">Contact Email*</label>
                        <input type="email" id="contact_email" name="contact_email" value="{{ old('contact_email', $accommodation->contact_email) }}" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" required />
                        @error('contact_email')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="contact_phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">Contact Phone*</label>
                        <input type="tel" id="contact_phone" name="contact_phone" value="{{ old('contact_phone', $accommodation->contact_phone) }}" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" required />
                        @error('contact_phone')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
        
                <div class="mb-5">
                    <label for="accommodation_registration_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">Registration Number</label>
                    <input type="text" id="accommodation_registration_number" name="accommodation_registration_number" value="{{ old('accommodation_registration_number', $accommodation->accommodation_registration_number) }}" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" />
                    @error('accommodation_registration_number')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        
            <!-- Policies & Amenities -->
            <div class="mb-6">
                <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-gray-200 border-b pb-2">Policies & Amenities</h3>
                
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="mb-5">
                        <label for="check_in_time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">Check-in Time</label>
                        <input type="time" id="check_in_time" name="check_in_time" value="{{ old('check_in_time', $accommodation->check_in_time) }}" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" />
                        @error('check_in_time')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="check_out_time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">Check-out Time</label>
                        <input type="time" id="check_out_time" name="check_out_time" value="{{ old('check_out_time', $accommodation->check_out_time) }}" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" />
                        @error('check_out_time')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
        
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">Amenities</label>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        <div class="flex items-center">
                            <input id="has_free_wifi" type="checkbox" name="has_free_wifi" value="1" {{ old('has_free_wifi', $accommodation->has_free_wifi) ? 'checked' : '' }} class="w-4 h-4 border border-gray-300 rounded-sm bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" />
                            <label for="has_free_wifi" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Free WiFi</label>
                        </div>
                        <div class="flex items-center">
                            <input id="has_parking" type="checkbox" name="has_parking" value="1" {{ old('has_parking', $accommodation->has_parking) ? 'checked' : '' }} class="w-4 h-4 border border-gray-300 rounded-sm bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" />
                            <label for="has_parking" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Parking</label>
                        </div>
                        <div class="flex items-center">
                            <input id="has_pool" type="checkbox" name="has_pool" value="1" {{ old('has_pool', $accommodation->has_pool) ? 'checked' : '' }} class="w-4 h-4 border border-gray-300 rounded-sm bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" />
                            <label for="has_pool" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Swimming Pool</label>
                        </div>
                        <div class="flex items-center">
                            <input id="has_gym" type="checkbox" name="has_gym" value="1" {{ old('has_gym', $accommodation->has_gym) ? 'checked' : '' }} class="w-4 h-4 border border-gray-300 rounded-sm bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" />
                            <label for="has_gym" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Gym</label>
                        </div>
                        <div class="flex items-center">
                            <input id="has_restaurant" type="checkbox" name="has_restaurant" value="1" {{ old('has_restaurant', $accommodation->has_restaurant) ? 'checked' : '' }} class="w-4 h-4 border border-gray-300 rounded-sm bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" />
                            <label for="has_restaurant" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Restaurant</label>
                        </div>
                        <div class="flex items-center">
                            <input id="has_air_conditioning" type="checkbox" name="has_air_conditioning" value="1" {{ old('has_air_conditioning', $accommodation->has_air_conditioning) ? 'checked' : '' }} class="w-4 h-4 border border-gray-300 rounded-sm bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" />
                            <label for="has_air_conditioning" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Air Conditioning</label>
                        </div>
                    </div>
                    @error('amenities')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
        
                <div class="mb-5">
                    <label for="amenities" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">Additional Amenities</label>
                    <textarea id="amenities" name="amenities" rows="3" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" placeholder="List any additional amenities...">{{ old('amenities', $accommodation->amenities) }}</textarea>
                    @error('amenities')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
    
                <div class="mb-5">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">Description</label>
                    <textarea id="description" name="description" rows="4" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" placeholder="Describe your accommodation...">{{ old('description', $accommodation->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        
            <div class="mb-6">
                <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-gray-200 border-b pb-2">Images</h3>
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200" for="thumbnail_image">Thumbnail Image</label>
                    @if($accommodation->thumbnail_image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $accommodation->thumbnail_image) }}" alt="Current thumbnail" class="h-20 w-20 object-cover rounded-md">
                        </div>
                    @endif
                    <x-input.image name="thumbnail_image"/>
                    @error('thumbnail_image')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">PNG, JPG or JPEG (MAX. 2MB)</p>
                </div>
            </div>
        
            <div class="mb-6">
                <div class="flex items-center mb-5">
                    <input id="is_active" type="checkbox" name="is_active" value="1" {{ old('is_active', $accommodation->is_active) ? 'checked' : '' }} class="w-4 h-4 border border-gray-300 rounded-sm bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" />
                    <label for="is_active" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Active Accommodation (visible to guests)</label>
                </div>
                @error('is_active')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="flex justify-end">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update Accommodation</button>
            </div>
        </form>

</x-layouts.dashboard> 