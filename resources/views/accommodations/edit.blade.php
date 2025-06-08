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
                        />

                        <x-form.select 
                            name="accommodation_type" 
                            label="Accommodation Type"
                            placeholder="Select accommodation type"
                            :value="old('accommodation_type', $accommodation->accommodation_type)"
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

                    <x-form.grid columns="2">
                        <x-form.input 
                            name="accommodation_address" 
                            label="Address" 
                            placeholder="123 Main Street"
                            :value="old('accommodation_address', $accommodation->accommodation_address)"
                            required 
                        />

                        <x-form.input 
                            name="city" 
                            label="City" 
                            placeholder="City"
                            :value="old('city', $accommodation->city)"
                            required 
                        />
                    </x-form.grid>

                    <x-form.grid columns="2">
                        <x-form.input 
                            name="state_province" 
                            label="State / Province" 
                            placeholder="State or Province"
                            :value="old('state_province', $accommodation->state_province)"
                        />

                        <x-form.input 
                            name="postal_code" 
                            label="Postal Code" 
                            placeholder="Postal Code"
                            :value="old('postal_code', $accommodation->postal_code)"
                        />
                    </x-form.grid>

                    <x-form.grid columns="2">
                        <x-form.input 
                            name="country" 
                            label="Country" 
                            placeholder="Country"
                            :value="old('country', $accommodation->country)"
                        />

                        <x-form.input 
                            name="accommodation_registration_number" 
                            label="Registration Number" 
                            placeholder="Optional registration/license number"
                            :value="old('accommodation_registration_number', $accommodation->accommodation_registration_number)"
                        />
                    </x-form.grid>

                    <x-form.grid columns="2">
                        <x-form.input 
                            name="longitude" 
                            type="number"
                            step="0.000001"
                            label="Longitude" 
                            placeholder="e.g., 104.928209"
                            :value="old('longitude', $accommodation->longitude)"
                        />

                        <x-form.input 
                            name="latitude" 
                            type="number"
                            step="0.000001"
                            label="Latitude" 
                            placeholder="e.g., 11.556374"
                            :value="old('latitude', $accommodation->latitude)"
                        />
                    </x-form.grid>
                </x-form.section>

                <x-form.section 
                    title="Contact Information"
                    description="How can guests reach you?"
                >
                    <x-form.grid columns="2">
                        <x-form.input 
                            type="email"
                            name="contact_email" 
                            label="Contact Email" 
                            placeholder="example@email.com"
                            :value="old('contact_email', $accommodation->contact_email)"
                        />

                        <x-form.input 
                            name="contact_phone" 
                            label="Contact Phone" 
                            placeholder="+855 12 345 678"
                            :value="old('contact_phone', $accommodation->contact_phone)"
                        />
                    </x-form.grid>
                </x-form.section>

                <x-form.section title="Amenities & Description">
                    <x-form.checkbox-group 
                        name="amenities"
                        label="Available Amenities"
                        columns="3"
                        :options="[
                            ['value' => 'wifi', 'name' => 'has_free_wifi', 'label' => '📶 Free WiFi', 'checked' => old('has_free_wifi', $accommodation->has_free_wifi)],
                            ['value' => 'parking', 'name' => 'has_parking', 'label' => '🚗 Parking', 'checked' => old('has_parking', $accommodation->has_parking)],
                            ['value' => 'pool', 'name' => 'has_pool', 'label' => '🏊 Swimming Pool', 'checked' => old('has_pool', $accommodation->has_pool)],
                            ['value' => 'gym', 'name' => 'has_gym', 'label' => '💪 Gym', 'checked' => old('has_gym', $accommodation->has_gym)],
                            ['value' => 'restaurant', 'name' => 'has_restaurant', 'label' => '🍽️ Restaurant', 'checked' => old('has_restaurant', $accommodation->has_restaurant)],
                            ['value' => 'ac', 'name' => 'has_air_conditioning', 'label' => '❄️ Air Conditioning', 'checked' => old('has_air_conditioning', $accommodation->has_air_conditioning)]
                        ]"
                        help-text="Select all amenities available at your property"
                    />

                    <x-form.textarea 
                        name="description" 
                        label="Description" 
                        placeholder="Describe your accommodation..."
                        rows="4"
                        :value="old('description', $accommodation->description)"
                    />
                </x-form.section>

                <x-form.section title="Image Upload">
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
                        label="Main Property Image"
                        accept="image/jpeg,image/png,image/jpg,image/gif,image/svg,image/webp,image/avif,image/bmp,image/tiff,image/ico,image/heic,image/psd,image/ai"
                        max-size="4MB"
                    />
                </x-form.section>

                <x-form.section title="Status Settings">
                    <x-form.checkbox 
                        name="is_active" 
                        label="Make this accommodation active and visible to guests"
                        :checked="old('is_active', $accommodation->is_active)"
                    />
                </x-form.section>

                <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200 dark:border-gray-700">
                    <x-form.button 
                        type="submit" 
                        variant="primary" 
                        size="lg"
                        class="flex-1 sm:flex-none"
                    >
                        Update Accommodation
                    </x-form.button>

                    <x-form.button 
                        type="button" 
                        variant="outline" 
                        size="lg"
                        onclick="window.history.back()"
                    >
                        Cancel
                    </x-form.button>
                </div>
            </form>
        </x-form.card>
    </div>
</x-layouts.dashboard>