<x-layouts.dashboard>
    <div class="max-w-full mx-auto">
        <x-form.card 
            title="{{trans('edit_accommodation')}}" 
            description="{{trans('update_accommodation_details')}}"
        >
            <form method="POST" action="{{ route('accommodations.update', $accommodation->id) }}" enctype="multipart/form-data" class="space-y-8">
                @csrf
                @method('PUT')

                <x-form.section 
                    title="{{trans('basic_information')}}"
                    description="{{trans('essential_details')}}"
                    icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-4m-5 0H3m2 0h4M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>'
                >
                    <x-form.grid columns="2">
                        <x-form.input 
                            name="accommodation_name" 
                            label="{{trans('accommodation_name')}}" 
                            placeholder="{{trans('enter_accommodation_name')}}"
                            :value="old('accommodation_name', $accommodation->accommodation_name)"
                            required 
                        />

                        <x-form.select 
                            name="accommodation_type" 
                            label="{{trans('accommodation_type')}}"
                            placeholder="{{trans('select_accommodation_type')}}"
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
                            label="{{trans('address')}}" 
                            placeholder="123 Main Street"
                            :value="old('accommodation_address', $accommodation->accommodation_address)"
                            required 
                        />

                        <x-form.input 
                            name="city" 
                            label="{{trans('city')}}" 
                            placeholder="{{trans('city')}}"
                            :value="old('city', $accommodation->city)"
                            required 
                        />
                    </x-form.grid>

                    <x-form.grid columns="2">
                        <x-form.input 
                            name="state_province" 
                            label="{{trans('state_province')}}" 
                            placeholder="{{trans('state_or_province')}}"
                            :value="old('state_province', $accommodation->state_province)"
                        />

                        <x-form.input 
                            name="postal_code" 
                            label="{{trans('postal_code')}}" 
                            placeholder="{{trans('postal_code')}}"
                            :value="old('postal_code', $accommodation->postal_code)"
                        />
                    </x-form.grid>

                    <x-form.grid columns="2">
                        <x-form.input 
                            name="country" 
                            label="{{trans('country')}}" 
                            placeholder="{{trans('country')}}"
                            :value="old('country', $accommodation->country)"
                        />

                        <x-form.input 
                            name="accommodation_registration_number" 
                            label="{{trans('registration_number')}}" 
                            placeholder="{{trans('optional_registration')}}"
                            :value="old('accommodation_registration_number', $accommodation->accommodation_registration_number)"
                        />
                    </x-form.grid>

                    <x-form.grid columns="2">
                        <x-form.input 
                            name="longitude" 
                            type="number"
                            step="0.000001"
                            label="{{trans('longitude')}}" 
                            placeholder="e.g., 104.928209"
                            :value="old('longitude', $accommodation->longitude)"
                        />

                        <x-form.input 
                            name="latitude" 
                            type="number"
                            step="0.000001"
                            label="{{trans('latitude')}}" 
                            placeholder="e.g., 11.556374"
                            :value="old('latitude', $accommodation->latitude)"
                        />
                    </x-form.grid>
                </x-form.section>

                <x-form.section 
                    title="{{trans('contact_information')}}"
                    description="{{trans('how_to_reach')}}"
                >
                    <x-form.grid columns="2">
                        <x-form.input 
                            type="email"
                            name="contact_email" 
                            label="{{trans('contact_email')}}" 
                            placeholder="example@email.com"
                            :value="old('contact_email', $accommodation->contact_email)"
                        />

                        <x-form.input 
                            name="contact_phone" 
                            label="{{trans('contact_phone')}}" 
                            placeholder="+855 12 345 678"
                            :value="old('contact_phone', $accommodation->contact_phone)"
                        />
                    </x-form.grid>
                </x-form.section>

                <x-form.section title="{{trans('amenities_description')}}">
                    <x-form.checkbox-group 
                        name="amenities"
                        label="{{trans('available_amenities')}}"
                        columns="3"
                        :options="[
                            ['value' => 'wifi', 'name' => 'has_free_wifi', 'label' => '📶 Free WiFi', 'checked' => old('has_free_wifi', $accommodation->has_free_wifi)],
                            ['value' => 'parking', 'name' => 'has_parking', 'label' => '🚗 Parking', 'checked' => old('has_parking', $accommodation->has_parking)],
                            ['value' => 'pool', 'name' => 'has_pool', 'label' => '🏊 Swimming Pool', 'checked' => old('has_pool', $accommodation->has_pool)],
                            ['value' => 'gym', 'name' => 'has_gym', 'label' => '💪 Gym', 'checked' => old('has_gym', $accommodation->has_gym)],
                            ['value' => 'restaurant', 'name' => 'has_restaurant', 'label' => '🍽️ Restaurant', 'checked' => old('has_restaurant', $accommodation->has_restaurant)],
                            ['value' => 'ac', 'name' => 'has_air_conditioning', 'label' => '❄️ Air Conditioning', 'checked' => old('has_air_conditioning', $accommodation->has_air_conditioning)]
                        ]"
                        help-text="{{trans('select_amenities')}}"
                    />

                    <x-form.textarea 
                        name="description" 
                        label="{{trans('description')}}" 
                        placeholder="{{trans('describe_accommodation')}}"
                        rows="4"
                        :value="old('description', $accommodation->description)"
                    />
                </x-form.section>

                <x-form.section title="{{trans('image_upload')}}">
                    @if($accommodation->thumbnail_image)
                        <div class="mb-4">
                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">{{trans('current_image')}}</p>
                            <img src="{{ asset('storage/' . $accommodation->thumbnail_image) }}" 
                                 alt="Current thumbnail" 
                                 class="h-32 w-32 object-cover rounded-lg border border-gray-200 dark:border-gray-600">
                        </div>
                    @endif
                    
                    <x-form.file-upload 
                        name="thumbnail_image" 
                        label="{{trans('main_property_image')}}"
                        accept="image/jpeg,image/png,image/jpg,image/gif,image/svg,image/webp,image/avif,image/bmp,image/tiff,image/ico,image/heic,image/psd,image/ai"
                        max-size="4MB"
                    />
                </x-form.section>

                <x-form.section title="{{trans('status_settings')}}">
                    <x-form.checkbox 
                        name="is_active" 
                        label="{{trans('make_active')}}"
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
                        {{trans('update_accommodation')}}
                    </x-form.button>

                    <x-form.button 
                        type="button" 
                        variant="outline" 
                        size="lg"
                        onclick="window.history.back()"
                    >
                        {{trans('cancel')}}
                    </x-form.button>
                </div>
            </form>
        </x-form.card>
    </div>
</x-layouts.dashboard>