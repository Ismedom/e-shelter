<x-layouts.dashboard>
    <x-layouts.accommodation :accommodation="$accommodation">
        <div class="max-w-full mx-auto px-4 py-8">
            <x-form.card title="{{ trans('edit_room_type') }}" description="{{ trans('update_room_type_details') }}">
                <div class="flex items-center gap-2 mb-6">
                    <a href="{{ route('room-types.index', $accommodation) }}" class="flex items-center text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        <span class="ml-1">{{ trans('back_to_room_types') }}</span>
                    </a>
                </div>

                <form action="{{ route('rooms.update', [$accommodation, $room]) }}" method="POST" enctype="multipart/form-data" class="space-y-10">
                    @csrf
                    @method('PUT')

                    <x-form.section 
                        title="{{ trans('basic_information') }}"
                        description="{{ trans('essential_details_about_room_type') }}"
                        icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>'
                    >
                        <x-form.grid columns="2">
                            <x-form.input 
                                name="type" 
                                label="{{ trans('room_type_name') }}" 
                                placeholder="{{ trans('room_type_name_placeholder') }}"
                                required
                                help-text="{{ trans('room_type_name_help') }}"
                            />
                            <x-form.input 
                                name="room_number" 
                                label="{{ trans('room_number') }}" 
                                placeholder="{{ trans('room_number') }}"
                                :value="old('room_number', $room->room_number ?? trans('no_number_assigned'))"
                                required
                                help-text="{{ trans('room_number_help') }}"
                            />

                        </x-form.grid>
                    </x-form.section>

                    <x-form.section 
                        title="{{ trans('pricing_details') }}"
                        description="{{ trans('set_pricing_for_room_type') }}"
                        icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'
                    >
                        <x-form.grid columns="2">
                            <x-form.input 
                                type="number"
                                name="pricing" 
                                label="{{ trans('price_per_night') }}" 
                                placeholder="0.00"
                                :value="old('pricing', $room_type->pricing ?? '0.00')"
                                min="0"
                                step="0.01"
                                required
                                icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'
                                help-text="{{ trans('base_price_per_night_help') }}"
                            />

                            <x-form.select 
                                name="currency" 
                                label="{{ trans('currency') }}"
                                placeholder="{{ trans('select_currency') }}"
                                :value="old('currency', $room_type->currency)"
                                required
                                :options="[
                                    ['value' => 'USD', 'label' => 'USD - US Dollar'],
                                    ['value' => 'EUR', 'label' => 'EUR - Euro'],
                                    ['value' => 'GBP', 'label' => 'GBP - British Pound'],
                                    ['value' => 'JPY', 'label' => 'JPY - Japanese Yen'],
                                    ['value' => 'CAD', 'label' => 'CAD - Canadian Dollar'],
                                    ['value' => 'AUD', 'label' => 'AUD - Australian Dollar']
                                ]"
                                help-text="{{ trans('choose_currency_help') }}"
                            />
                        </x-form.grid>

                        <x-form.grid columns="2">
                            <x-form.input 
                                type="number"
                                name="discount" 
                                label="{{ trans('discount_percent') }}" 
                                placeholder="0"
                                :value="old('discount', $room_type->discount ?? '0')"
                                min="0"
                                max="100"
                                icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2zM10 8.5a.5.5 0 11-1 0 .5.5 0 011 0zm5 5a.5.5 0 11-1 0 .5.5 0 011 0z"/></svg>'
                                help-text="{{ trans('discount_help') }}"
                            />

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                    {{ trans('final_price_after_discount') }}
                                </label>
                                <div class="shadow-xs bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-200 text-sm rounded-md p-2.5">
                                    <span id="finalPrice">
                                        @php
                                            $price = old('pricing', $room_type->pricing ?? 0);
                                            $discount = old('discount', $room_type->discount ?? 0);
                                            $finalPrice = $price - ($price * $discount / 100);
                                            $currencySymbol = match($room_type->currency ?? 'USD') {
                                                'EUR' => '€',
                                                'GBP' => '£',
                                                'JPY' => '¥',
                                                'CAD' => 'CA$',
                                                'AUD' => 'A$',
                                                default => '$'
                                            };
                                        @endphp
                                        {{ $currencySymbol }}{{ number_format($finalPrice, 2) }}
                                    </span>
                                </div>
                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">{{ trans('final_price_after_discount_help') }}</p>
                            </div>
                        </x-form.grid>
                    </x-form.section>

                    <x-form.section 
                        title="{{ trans('description') }}"
                        description="{{ trans('describe_features_and_amenities') }}"
                        icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>'
                    >
                        <x-form.textarea 
                            name="description" 
                            label="{{ trans('room_description') }}" 
                            placeholder="{{ trans('room_description_placeholder') }}"
                            :value="old('description', $room_type->description)"
                            rows="4"
                            help-text="{{ trans('room_description_help') }}"
                        />
                    </x-form.section>

                    <x-form.section 
                        title="{{ trans('room_image') }}"
                        description="{{ trans('upload_room_image') }}"
                        icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>'
                    >
                        <div class="space-y-4">
                            @if($room_type->image)
                                <div class="mb-4">
                                    <img src="{{ asset('storage/' . $room_type->image) }}" alt="{{ trans('current_room_image') }}" class="h-48 w-full object-cover rounded-lg shadow-sm">
                                    <div class="mt-2 flex items-center">
                                        <input type="checkbox" id="remove_image" name="remove_image" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="remove_image" class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ trans('remove_current_image') }}</label>
                                    </div>
                                </div>
                            @endif
                            <x-form.file-upload 
                                name="image" 
                                label="{{ trans('upload_new_room_image') }}"
                                accept="image/*"
                                help-text="{{ trans('recommended_image_size') }}"
                            />
                            <div class="text-xs text-gray-500 dark:text-gray-400">
                                <p class="font-medium mb-1">{{ trans('recommendations') }}</p>
                                <ul class="list-disc pl-5 space-y-1">
                                    <li>{{ trans('use_high_quality_images') }}</li>
                                    <li>{{ trans('optimal_size') }}</li>
                                    <li>{{ trans('show_room_best_light') }}</li>
                                </ul>
                            </div>
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
                            {{ trans('update_room_type') }}
                        </x-form.button>
                        <x-form.button 
                            type="button" 
                            variant="outline" 
                            size="lg"
                            onclick="window.location='{{ route('room-types.index', $accommodation) }}'"
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>'
                        >
                            {{ trans('cancel') }}
                        </x-form.button>
                    </div>
                </form>
            </x-form.card>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const pricingInput = document.querySelector('input[name="pricing"]');
                const discountInput = document.querySelector('input[name="discount"]');
                const finalPriceSpan = document.getElementById('finalPrice');
                const currencySelect = document.querySelector('select[name="currency"]');

                function updateFinalPrice() {
                    const price = parseFloat(pricingInput.value) || 0;
                    const discount = parseFloat(discountInput.value) || 0;
                    const finalPrice = price - (price * discount / 100);
                    let currencySymbol = '$';
                    switch(currencySelect.value) {
                        case 'EUR': currencySymbol = '€'; break;
                        case 'GBP': currencySymbol = '£'; break;
                        case 'JPY': currencySymbol = '¥'; break;
                        case 'CAD': currencySymbol = 'CA$'; break;
                        case 'AUD': currencySymbol = 'A$'; break;
                        default: currencySymbol = '$';
                    }
                    finalPriceSpan.textContent = currencySymbol + finalPrice.toFixed(2);
                }

                if (pricingInput && discountInput && finalPriceSpan && currencySelect) {
                    pricingInput.addEventListener('input', updateFinalPrice);
                    discountInput.addEventListener('input', updateFinalPrice);
                    currencySelect.addEventListener('change', updateFinalPrice);
                    updateFinalPrice();
                }
            });
        </script>
    </x-layouts.accommodation>
</x-layouts.dashboard>