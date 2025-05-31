<x-layouts.dashboard>
    <div class="max-w-full mx-auto">
        <x-form.card 
            title="Edit Accommodation" 
            description="Update your accommodation details below."
        >
            <form method="POST" action="{{ route('accommodations.update', $accommodation->id) }}" enctype="multipart/form-data" class="space-y-8">
                @csrf
                @method('PUT')
                
                <x-form.section 
                    title="Basic Information"
                    description="Essential details about your accommodation"
                    icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-4m-5 0H3m2 0h4M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>'
                >
                    <x-form.grid columns="2">
                        <x-form.input 
                            name="accommodation_name" 
                            label="Accommodation Name" 
                            placeholder="Enter accommodation name"
                            :value="old('accommodation_name', $accommodation->accommodation_name)"
                            required 
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-4m-5 0H3m2 0h4M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>'
                        />
                        
                        <x-form.select 
                            name="accommodation_type" 
                            label="Accommodation Type"
                            placeholder="Select accommodation type"
                            :value="old('accommodation_type', $accommodation->accommodation_type)"
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-4m-5 0H3m2 0h4M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>'
                            :options="[
                                ['value' => 'Hotel', 'label' => 'Hotel'],
                                ['value' => 'Resort', 'label' => 'Resort'],
                                ['value' => 'Apartment', 'label' => 'Apartment'],
                                ['value' => 'Villa', 'label' => 'Villa'],
                                ['value' => 'Cottage', 'label' => 'Cottage'],
                                ['value' => 'Hostel', 'label' => 'Hostel'],
                                ['value' => 'Guesthouse', 'label' => 'Guesthouse']
                            ]"
                        />
                    </x-form.grid>
                </x-form.section>
                <x-form.section 
                    title="Location Details"
                    description="Where is your accommodation located?"
                    icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>'
                >
                    <x-form.input 
                        name="accommodation_address" 
                        label="Address" 
                        placeholder="Enter complete address"
                        :value="old('accommodation_address', $accommodation->accommodation_address)"
                        required 
                        icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>'
                    />
                    
                    <x-form.grid columns="2">
                        <x-form.input 
                            name="city" 
                            label="City" 
                            placeholder="City name"
                            :value="old('city', $accommodation->city)"
                            required 
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-4m-5 0H3m2 0h4M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>'
                        />
                        <x-form.input 
                            name="state_province" 
                            label="State/Province" 
                            placeholder="State or province"
                            :value="old('state_province', $accommodation->state_province)"
                        />
                    </x-form.grid>
                    
                    <x-form.grid columns="2">
                        <x-form.input 
                            name="postal_code" 
                            label="Postal Code" 
                            placeholder="Postal/ZIP code"
                            :value="old('postal_code', $accommodation->postal_code)"
                        />
                        <x-form.select 
                            name="country" 
                            label="Country" 
                            placeholder="Select country"
                            :value="old('country', $accommodation->country)"
                            required
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'
                            :options="[
                                ['value' => 'Cambodia', 'label' => 'Cambodia'],
                                ['value' => 'Indonesia', 'label' => 'Indonesia'],
                                ['value' => 'Malaysia', 'label' => 'Malaysia'],
                                ['value' => 'Singapore', 'label' => 'Singapore'],
                                ['value' => 'Thailand', 'label' => 'Thailand']
                            ]"
                        />
                    </x-form.grid>
                    
                    <x-form.grid columns="2">
                        <x-form.input 
                            name="latitude" 
                            label="Latitude" 
                            placeholder="e.g. -6.2088"
                            :value="old('latitude', $accommodation->latitude)"
                            type="number"
                            step="any"
                            help-text="Optional: For precise location mapping"
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>'
                        />
                        <x-form.input 
                            name="longitude" 
                            label="Longitude" 
                            placeholder="e.g. 106.8456"
                            :value="old('longitude', $accommodation->longitude)"
                            type="number"
                            step="any"
                            help-text="Optional: For precise location mapping"
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>'
                        />
                    </x-form.grid>
                </x-form.section>
                <x-form.section 
                    title="Contact Information"
                    description="How can guests reach you?"
                    icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>'
                >
                    <x-form.grid columns="2">
                        <x-form.input 
                            type="email"
                            name="contact_email" 
                            label="Contact Email" 
                            placeholder="your@email.com"
                            :value="old('contact_email', $accommodation->contact_email)"
                            required 
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>'
                        />
                        <x-form.input 
                            type="tel"
                            name="contact_phone" 
                            label="Contact Phone" 
                            placeholder="+1 (555) 123-4567"
                            :value="old('contact_phone', $accommodation->contact_phone)"
                            required 
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>'
                        />
                    </x-form.grid>
                    
                    <x-form.input 
                        name="accommodation_registration_number" 
                        label="Registration Number" 
                        placeholder="Official registration number (if applicable)"
                        :value="old('accommodation_registration_number', $accommodation->accommodation_registration_number)"
                        help-text="Business license or tourism registration number"
                        icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>'
                    />
                </x-form.section>

                <x-form.section 
                    title="Policies & Amenities"
                    description="Set your check-in policies and highlight amenities"
                    icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'
                >
                    <x-form.grid columns="2">
                        <x-form.input 
                            type="time"
                            name="check_in_time" 
                            label="Check-in Time" 
                            :value="old('check_in_time', $accommodation->check_in_time)"
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'
                        />
                        <x-form.input 
                            type="time"
                            name="check_out_time" 
                            label="Check-out Time" 
                            :value="old('check_out_time', $accommodation->check_out_time)"
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'
                        />
                    </x-form.grid>
                    
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                            Available Amenities
                        </label>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 mt-2">
                            <x-form.checkbox 
                                name="has_free_wifi" 
                                label="📶 Free WiFi"
                                value="1"
                                :checked="old('has_free_wifi', $accommodation->has_free_wifi)"
                            />
                            
                            <x-form.checkbox 
                                name="has_parking" 
                                label="🚗 Parking"
                                value="1"
                                :checked="old('has_parking', $accommodation->has_parking)"
                            />
                            
                            <x-form.checkbox 
                                name="has_pool" 
                                label="🏊 Swimming Pool"
                                value="1"
                                :checked="old('has_pool', $accommodation->has_pool)"
                            />
                            
                            <x-form.checkbox 
                                name="has_gym" 
                                label="💪 Gym/Fitness"
                                value="1"
                                :checked="old('has_gym', $accommodation->has_gym)"
                            />
                            
                            <x-form.checkbox 
                                name="has_restaurant" 
                                label="🍽️ Restaurant"
                                value="1"
                                :checked="old('has_restaurant', $accommodation->has_restaurant)"
                            />
                            
                            <x-form.checkbox 
                                name="has_air_conditioning" 
                                label="❄️ Air Conditioning"
                                value="1"
                                :checked="old('has_air_conditioning', $accommodation->has_air_conditioning)"
                            />
                        </div>
                        
                        @error('amenities')
                            <div class="text-red-500 text-sm mt-1 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </div>
                        @enderror
                        
                        <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">Select all amenities available at your property</p>
                    </div>
                    
                    <x-form.textarea 
                        name="amenities" 
                        label="Additional Amenities & Services" 
                        placeholder="List any other amenities, services, or special features..."
                        :value="old('amenities', $accommodation->amenities)"
                        rows="3"
                        help-text="Describe unique features that set your property apart"
                    />
                    
                    <x-form.textarea 
                        name="description" 
                        label="Description" 
                        placeholder="Describe your accommodation, its unique features, and what makes it special..."
                        :value="old('description', $accommodation->description)"
                        rows="4"
                        help-text="Provide a detailed description to attract potential guests"
                    />
                </x-form.section>

                <x-form.section 
                    title="Property Images"
                    description="Update images to showcase your accommodation"
                    icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>'
                >
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                            Thumbnail Image
                        </label>
                        
                        @if($accommodation->thumbnail_image)
                            <div class="mb-4">
                                <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Current Image:</p>
                                <img src="{{ asset('storage/' . $accommodation->thumbnail_image) }}" 
                                     alt="Current thumbnail" 
                                     class="h-32 w-32 object-cover rounded-lg border border-gray-200 dark:border-gray-600">
                            </div>
                        @endif
                        
                        <x-form.file-upload 
                            name="thumbnail_image" 
                            :show-label="false"
                            accept="image/*"
                            help-text="Upload a new image to replace the current one"
                            max-size="5MB"
                        />
                    </div>
                </x-form.section>

                <x-form.section title="Status Settings">
                    <x-form.checkbox 
                        name="is_active" 
                        label="Active Accommodation (visible to guests)"
                        value="1"
                        :checked="old('is_active', $accommodation->is_active)"
                        help-text="Toggle this to make your accommodation visible or hidden from guests"
                    />
                </x-form.section>
                
                <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200 dark:border-gray-700">
                    <x-form.button 
                        type="submit" 
                        variant="primary" 
                        size="lg"
                        class="flex-1 sm:flex-none"
                        icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>'
                    >
                        Update Accommodation
                    </x-form.button>
                    
                    <x-form.button 
                        type="button" 
                        variant="outline" 
                        size="lg"
                        onclick="window.history.back()"
                        icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>'
                    >
                        Cancel
                    </x-form.button>
                </div>
            </form>
        </x-form.card>
    </div>
</x-layouts.dashboard>