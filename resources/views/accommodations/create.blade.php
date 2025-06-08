<x-layouts.dashboard>
    <div class="max-w-full mx-auto">
        <x-form.card 
            title="Register New Accommodation" 
            description="Fill in the details below to register your accommodation property."
        >
            <form method="POST" action="{{ route('accommodations.store') }}" enctype="multipart/form-data" class="space-y-8">
                @csrf

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
                            required 
                        />

                        <x-form.select 
                            name="accommodation_type" 
                            label="Accommodation Type"
                            placeholder="Select accommodation type"
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
                            required 
                        />

                        <x-form.input 
                            name="city" 
                            label="City" 
                            placeholder="City"
                            required 
                        />
                    </x-form.grid>

                    <x-form.grid columns="2">
                        <x-form.input 
                            name="state_province" 
                            label="State / Province" 
                            placeholder="State or Province"
                        />

                        <x-form.input 
                            name="postal_code" 
                            label="Postal Code" 
                            placeholder="Postal Code"
                        />
                    </x-form.grid>

                    <x-form.grid columns="2">
                        <x-form.input 
                            name="country" 
                            label="Country" 
                            placeholder="Country"
                        />

                        <x-form.input 
                            name="accommodation_registration_number" 
                            label="Registration Number" 
                            placeholder="Optional registration/license number"
                        />
                    </x-form.grid>

                    <x-form.grid columns="2">
                        <x-form.input 
                            name="longitude" 
                            type="number"
                            step="0.000001"
                            label="Longitude" 
                            placeholder="e.g., 104.928209"
                        />

                        <x-form.input 
                            name="latitude" 
                            type="number"
                            step="0.000001"
                            label="Latitude" 
                            placeholder="e.g., 11.556374"
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
                        />

                        <x-form.input 
                            name="contact_phone" 
                            label="Contact Phone" 
                            placeholder="+855 12 345 678"
                        />
                    </x-form.grid>
                </x-form.section>

                <x-form.section title="Amenities & Description">
                    <x-form.checkbox-group 
                        name="amenities"
                        label="Available Amenities"
                        columns="3"
                        :options="[
                            ['value' => 'wifi', 'name' => 'has_free_wifi', 'label' => '📶 Free WiFi'],
                            ['value' => 'parking', 'name' => 'has_parking', 'label' => '🚗 Parking'],
                            ['value' => 'pool', 'name' => 'has_pool', 'label' => '🏊 Swimming Pool'],
                            ['value' => 'gym', 'name' => 'has_gym', 'label' => '💪 Gym'],
                            ['value' => 'restaurant', 'name' => 'has_restaurant', 'label' => '🍽️ Restaurant'],
                            ['value' => 'ac', 'name' => 'has_air_conditioning', 'label' => '❄️ Air Conditioning']
                        ]"
                        help-text="Select all amenities available at your property"
                    />

                    <x-form.textarea 
                        name="description" 
                        label="Description" 
                        placeholder="Describe your accommodation..."
                        rows="4"
                    />
                </x-form.section>

                <x-form.section title="Image Upload">
                    <x-form.file-upload 
                        name="thumbnail_image" 
                        label="Main Property Image"
                        accept="image/jpeg,image/png,image/jpg,image/gif,image/svg,image/webp,image/avif,image/bmp,image/tiff,image/ico,image/heic,image/psd,image/ai"
                        max-size="4MB"
                    />
                </x-form.section>

                <x-form.section title="Final Settings">
                    <div class="space-y-4">
                        <x-form.checkbox 
                            name="is_active" 
                            label="Make this accommodation active and visible to guests"
                            :checked="true"
                        />

                        <x-form.checkbox 
                            name="terms" 
                            label="I confirm that all information provided is accurate and I agree to the terms and conditions"
                            required
                        />
                    </div>
                </x-form.section>

                <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200 dark:border-gray-700">
                    <x-form.button 
                        type="submit" 
                        variant="primary" 
                        size="lg"
                        class="flex-1 sm:flex-none"
                    >
                        Register Accommodation
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
