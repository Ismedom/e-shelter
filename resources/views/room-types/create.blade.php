<x-layouts.dashboard>
    <x-layouts.accommodation  :accommodation="$accommodation">
        <div class="p-4">
            <div class="mb-6">
                <div class="flex items-center gap-2 mb-2">
                    <a href="{{ route('room-types.index', $accommodation) }}" class="flex items-center text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        <span class="ml-1">Back to Room Types</span>
                    </a>
                </div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Create Room Type</h1>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Add a new room type to your accommodation.
                </p>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
                <div class="border-b border-gray-200 dark:border-gray-700">
                    <div class="p-4">
                        <div class="flex items-center">
                            <div class="flex items-center justify-center w-8 h-8 bg-blue-100 text-blue-600 rounded-full dark:bg-blue-900 dark:text-blue-200">
                                <span class="text-sm font-medium">1</span>
                            </div>
                            <div class="ml-3">
                                <span class="text-sm font-medium text-blue-600 dark:text-blue-400">Basic Information</span>
                            </div>
                            <div class="ml-auto flex items-center">
                                <span class="text-xs text-gray-500 dark:text-gray-400">Required fields are marked with *</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <form action="{{ route('room-types.store', $accommodation) }}" method="POST" enctype="multipart/form-data" class="p-6">
                    @csrf
                    
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">>
                        <div class="lg:col-span-2 space-y-6">
                            <div>
                                <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">
                                    Room Type Name <span class="text-red-500">*</span>
                                </label>
                                <input type="text" 
                                       id="type" 
                                       name="type" 
                                       value="{{ old('type') }}" 
                                       class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" 
                                       placeholder="e.g. Deluxe, Standard, Suite" 
                                       required />
                                @error('type')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <!-- Pricing Section -->
                            <div class="p-5 border border-gray-200 rounded-lg dark:border-gray-700">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Pricing Details</h3>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <!-- Price -->
                                    <div>
                                        <label for="pricing" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">
                                            Price Per Night <span class="text-red-500">*</span>
                                        </label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                <span class="text-gray-500 dark:text-gray-400">$</span>
                                            </div>
                                            <input type="number" 
                                                id="pricing" 
                                                name="pricing" 
                                                min="0" 
                                                step="0.01" 
                                                value="{{ old('pricing', '0.00') }}" 
                                                class="pl-8 shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" 
                                                placeholder="0.00" 
                                                required />
                                        </div>
                                        @error('pricing')
                                            <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    
                                    <!-- Currency -->
                                    <div>
                                        <label for="currency" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">
                                            Currency <span class="text-red-500">*</span>
                                        </label>
                                        <select id="currency" 
                                                name="currency" 
                                                class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light"
                                                required>
                                            <option value="" disabled {{ old('currency') ? '' : 'selected' }}>Select currency</option>
                                            <option value="USD" {{ old('currency') == 'USD' ? 'selected' : '' }}>USD - US Dollar</option>
                                            <option value="EUR" {{ old('currency') == 'EUR' ? 'selected' : '' }}>EUR - Euro</option>
                                            <option value="GBP" {{ old('currency') == 'GBP' ? 'selected' : '' }}>GBP - British Pound</option>
                                            <option value="JPY" {{ old('currency') == 'JPY' ? 'selected' : '' }}>JPY - Japanese Yen</option>
                                            <option value="CAD" {{ old('currency') == 'CAD' ? 'selected' : '' }}>CAD - Canadian Dollar</option>
                                            <option value="AUD" {{ old('currency') == 'AUD' ? 'selected' : '' }}>AUD - Australian Dollar</option>
                                        </select>
                                        @error('currency')
                                            <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    
                                    <!-- Discount -->
                                    <div>
                                        <label for="discount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">
                                            Discount (%)
                                        </label>
                                        <div class="relative">
                                            <input type="number" 
                                                id="discount" 
                                                name="discount" 
                                                min="0" 
                                                max="100" 
                                                value="{{ old('discount', '0') }}" 
                                                class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" 
                                                placeholder="0" />
                                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                                <span class="text-gray-500 dark:text-gray-400">%</span>
                                            </div>
                                        </div>
                                        @error('discount')
                                            <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    
                                    <!-- Calculated Price After Discount (Optional) -->
                                    <div>
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">
                                            Final Price (after discount)
                                        </label>
                                        <div class="shadow-xs bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-md block w-full p-2.5 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-200 dark:shadow-xs-light">
                                            <span id="finalPrice">$0.00</span>
                                        </div>
                                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">This is the price after applying discount</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Description -->
                            <div>
                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">
                                    Description
                                </label>
                                <textarea id="description" 
                                          name="description" 
                                          rows="5" 
                                          class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light" 
                                          placeholder="Describe the features and amenities of this room type...">{{ old('description') }}</textarea>
                                @error('description')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- Right Column - Image Upload -->
                        <div class="lg:col-span-1">
                            <div class="p-5 border border-gray-200 rounded-lg dark:border-gray-700">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Room Image</h3>
                                
                                <div class="mb-4">
                                    <div class="flex items-center justify-center w-full">
                                        <label for="image" class="flex flex-col items-center justify-center w-full h-60 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500">
                                            <div id="image-preview-container" class="hidden w-full h-full relative">
                                                <img id="image-preview" class="w-full h-full rounded-lg object-cover" src="#" alt="Room preview">
                                                <button type="button" id="remove-image" class="absolute top-2 right-2 bg-white rounded-full p-1 shadow-sm">
                                                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div id="upload-placeholder" class="flex flex-col items-center justify-center pt-5 pb-6">
                                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                                </svg>
                                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                                <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG or JPEG (MAX. 2MB)</p>
                                            </div>
                                            <input id="image" name="image" type="file" class="hidden" accept="image/*" />
                                        </label>
                                    </div>
                                    @error('image')
                                        <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div class="mt-4 text-xs text-gray-500 dark:text-gray-400">
                                    <p class="mb-2">Recommendations:</p>
                                    <ul class="list-disc pl-5 space-y-1">
                                        <li>Use high quality images</li>
                                        <li>Optimal size: 1200 x 800 pixels</li>
                                        <li>Maximum file size: 2MB</li>
                                        <li>Show the room in the best light</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Form Actions -->
                    <div class="mt-8 flex justify-end space-x-3 border-t border-gray-200 dark:border-gray-700 pt-6">
                        <a href="{{ route('room-types.index', $accommodation) }}" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50 transition-colors dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:hover:bg-gray-600">
                            Cancel
                        </a>
                        <button type="submit" class="px-5 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Create Room Type
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- JavaScript for image preview and price calculation -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Image preview functionality
                const imageInput = document.getElementById('image');
                const imagePreview = document.getElementById('image-preview');
                const previewContainer = document.getElementById('image-preview-container');
                const uploadPlaceholder = document.getElementById('upload-placeholder');
                const removeButton = document.getElementById('remove-image');
                
                imageInput.addEventListener('change', function() {
                    const file = this.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            imagePreview.src = e.target.result;
                            previewContainer.classList.remove('hidden');
                            uploadPlaceholder.classList.add('hidden');
                        }
                        reader.readAsDataURL(file);
                    }
                });
                
                removeButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    imageInput.value = '';
                    imagePreview.src = '#';
                    previewContainer.classList.add('hidden');
                    uploadPlaceholder.classList.remove('hidden');
                });
                
                // Price calculation functionality
                const pricingInput = document.getElementById('pricing');
                const discountInput = document.getElementById('discount');
                const finalPriceSpan = document.getElementById('finalPrice');
                const currencySelect = document.getElementById('currency');
                
                function updateFinalPrice() {
                    const price = parseFloat(pricingInput.value) || 0;
                    const discount = parseFloat(discountInput.value) || 0;
                    const finalPrice = price - (price * discount / 100);
                    
                    // Get the selected currency symbol
                    let currencySymbol = '$'; // Default
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
                
                pricingInput.addEventListener('input', updateFinalPrice);
                discountInput.addEventListener('input', updateFinalPrice);
                currencySelect.addEventListener('change', updateFinalPrice);
                
                // Initialize the final price on page load
                updateFinalPrice();
            });
        </script>
    </x-layouts.accommodation>
</x-layouts.dashboard>