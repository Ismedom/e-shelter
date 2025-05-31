
<x-layouts.dashboard>
    <div class="max-w-4xl mx-auto py-8">
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
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-4m-5 0H3m2 0h4M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>'
                        />
                        
                        <x-form.select 
                            name="accommodation_type" 
                            label="Accommodation Type"
                            required
                            placeholder="Select accommodation type"
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
                            required 
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>'
                        />
                        <x-form.input 
                            type="tel"
                            name="contact_phone" 
                            label="Contact Phone" 
                            placeholder="+1 (555) 123-4567"
                            required 
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>'
                        />
                    </x-form.grid>
                </x-form.section>

                <x-form.section title="Security">
                    <x-form.grid columns="2">
                        <x-form.input 
                            type="password"
                            name="password" 
                            label="Password" 
                            placeholder="Enter your password"
                            required 
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>'
                        />
                        
                        <x-form.input 
                            type="password"
                            name="password_confirmation" 
                            label="Confirm Password" 
                            placeholder="Confirm your password"
                            required 
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'
                        />
                    </x-form.grid>
                </x-form.section>
                <x-form.section title="Amenities">
                    <x-form.checkbox-group 
                        name="amenities"
                        label="Available Amenities"
                        columns="3"
                        :options="[
                            ['value' => 'wifi', 'name' => 'has_free_wifi', 'label' => '📶 Free WiFi'],
                            ['value' => 'parking', 'name' => 'has_parking', 'label' => '🚗 Parking'],
                            ['value' => 'pool', 'name' => 'has_pool', 'label' => '🏊 Swimming Pool'],
                            ['value' => 'gym', 'name' => 'has_gym', 'label' => '💪 Gym/Fitness'],
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
                        help-text="Provide a detailed description to attract potential guests"
                    />
                </x-form.section>

                {{-- File Upload Section --}}
                <x-form.section title="Images">
                    <x-form.file-upload 
                        name="thumbnail_image" 
                        label="Main Property Image"
                        accept="image/*"
                        help-text="This will be the primary image displayed in search results"
                        max-size="5MB"
                        required
                    />
                </x-form.section>

                <x-form.section title="Final Settings">
                    <div class="space-y-4">
                        <x-form.checkbox 
                            name="is_active" 
                            label="Make this accommodation active and visible to guests"
                            :checked="true"
                            help-text="You can change this setting later from your dashboard"
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
                        icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>'
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

{{-- Example of conditional visibility --}}
<x-form.input 
    name="email" 
    label="Email Address" 
    :show-label="false"  {{-- Hide label --}}
    :show-icon="true"    {{-- Show icon --}}
    icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>'
/>

<x-form.section 
    title="Hidden Title" 
    description="Hidden Description"
    :show-title="false"       {{-- Hide title --}}
    :show-description="false" {{-- Hide description --}}
    :show-icon="false"        {{-- Hide icon --}}
>
    {{-- Content here --}}
</x-form.section>