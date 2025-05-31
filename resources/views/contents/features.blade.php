<x-layouts.dashboard>
    @include('contents.tabs')
    
    <div class="max-w-full mx-auto">
        <x-form.card 
            title="Features Section Configuration" 
            description="Configure the features and capabilities section that will be displayed on your platform."
        >
            <form method="POST" action="" class="space-y-8" x-data="featureManager()" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <x-form.section 
                    title="Section Settings"
                    description="Configure the main title and background for the features section"
                    icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/></svg>'
                >
                    <x-form.grid columns="2">
                        <x-form.input 
                            name="section_title" 
                            label="Section Title" 
                            placeholder="Enter the main section title"
                            value="Our Platform Features"
                            required 
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>'
                            help-text="This will be the main heading displayed above the features"
                        />
                        
                        <x-form.input 
                            name="subtitle" 
                            label="Subtitle" 
                            placeholder="Enter subtitle text"
                            value="Discover what makes our platform stand out"
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/></svg>'
                            help-text="Brief description or subtitle for the features section"
                        />
                    </x-form.grid>
                    
                    <x-form.file-upload 
                        name="background_image" 
                        label="Background Image"
                        accept="image/*"
                        help-text="This image will be used as the background for the features section"
                        max-size="10MB"
                        placeholder="Upload a background image for the features section"
                    />
                </x-form.section>

                <x-form.section 
                    title="Features List"
                    description="Configure the individual features that will be displayed"
                    icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>'
                >
                    <div class="space-y-4">
                        <template x-for="(feature, index) in features" :key="index">
                            <div class="relative bg-gradient-to-br from-indigo-50 to-blue-50 dark:from-indigo-900/20 dark:to-blue-900/20 rounded-2xl border border-indigo-200 dark:border-indigo-800 p-4 shadow-lg">
                                <div class="flex items-center gap-4">
                                    <div class="flex-grow">
                                        <div class="flex items-center gap-3">
                                            <div class="flex-shrink-0 w-10 h-10 bg-indigo-100 dark:bg-indigo-800/40 rounded-lg flex items-center justify-center">
                                                <svg class="w-5 h-5 text-indigo-600 dark:text-indigo-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                                </svg>
                                            </div>
                                            <div class="flex-grow">
                                                <input 
                                                    type="text" 
                                                    x-model="feature.text"
                                                    :name="`features[${index}][text]`"
                                                    placeholder="Enter feature description"
                                                    required
                                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 shadow-sm"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-center gap-2">
                                        <button 
                                            type="button" 
                                            @click="moveFeature(index, 'up')"
                                            x-show="index > 0"
                                            class="p-2 text-gray-500 hover:text-indigo-600 transition-colors duration-200"
                                            title="Move up"
                                        >
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/>
                                            </svg>
                                        </button>
                                        
                                        <button 
                                            type="button" 
                                            @click="moveFeature(index, 'down')"
                                            x-show="index < features.length - 1"
                                            class="p-2 text-gray-500 hover:text-indigo-600 transition-colors duration-200"
                                            title="Move down"
                                        >
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                            </svg>
                                        </button>
                                        
                                        <button 
                                            type="button" 
                                            @click="removeFeature(index)"
                                            class="p-2 text-red-500 hover:text-red-700 transition-colors duration-200"
                                            title="Delete feature"
                                        >
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </template>
                        
                        <div class="text-center">
                            <x-form.button 
                                type="button" 
                                variant="outline" 
                                size="lg"
                                @click="addFeature()"
                                class="w-full border-2 border-dashed border-indigo-300 dark:border-indigo-700 text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300 hover:border-indigo-400 dark:hover:border-indigo-600"
                                icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>'
                            >
                                Add New Feature
                            </x-form.button>
                        </div>
                    </div>
                </x-form.section>

                <x-form.section 
                    title="Display Settings"
                    description="Configure how the features section appears on your website"
                    icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>'
                >
                    <x-form.grid columns="3">
                        <x-form.select 
                            name="layout_style" 
                            label="Layout Style"
                            required
                            help-text="Choose how features will be displayed"
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>'
                            :options="[
                                ['value' => 'grid', 'label' => 'Grid Layout'],
                                ['value' => 'list', 'label' => 'List Layout'],
                                ['value' => 'columns', 'label' => 'Multi-Column Layout']
                            ]"
                        />
                        
                        <x-form.checkbox 
                            name="show_icons" 
                            label="Show feature icons"
                            :checked="true"
                            help-text="Display icons next to each feature"
                        />
                        
                        <x-form.checkbox 
                            name="is_active" 
                            label="Display features section"
                            :checked="true"
                            help-text="Toggle to show or hide the entire features section"
                        />
                    </x-form.grid>
                    
                    <x-form.input 
                        name="cta_text" 
                        label="Call to Action Text" 
                        placeholder="Enter call to action text"
                        value="Explore All Features"
                        icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'
                        help-text="Text for the button below the features (leave empty to hide)"
                    />
                </x-form.section>
                
                {{-- Form Actions --}}
                <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200 dark:border-gray-700">
                    <x-form.button 
                        type="submit" 
                        variant="primary" 
                        size="lg"
                        class="flex-1 sm:flex-none"
                        icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>'
                    >
                        Save Changes
                    </x-form.button>
                    
                    <x-form.button 
                        type="button" 
                        variant="outline" 
                        size="lg"
                        onclick="window.location.href='{{ route('contents.index') }}'"
                        icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>'
                    >
                        Cancel
                    </x-form.button>
                    
                    <x-form.button 
                        type="button" 
                        variant="secondary" 
                        size="lg"
                        onclick="previewFeatures()"
                        icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>'
                    >
                        Preview
                    </x-form.button>
                </div>
            </form>
        </x-form.card>
    </div>

    <script>
        function featureManager() {
            return {
                features: [
                    { text: "25 Provinces available for serving hotel services" },
                    { text: "24/7 hours customer support" },
                    { text: "Fast & Secure Booking System" },
                    { text: "Multi-Language Assistance" },
                    { text: "Real Guest Reviews" },
                    { text: "Over 1,000 Trusted Hotel Partners" },
                    { text: "Daily Booking Analytics for Hosts" }
                ],
                
                addFeature() {
                    this.features.push({ text: "" });
                },
                
                removeFeature(index) {
                    if (this.features.length > 1) {
                        this.features.splice(index, 1);
                    } else {
                       // alert('You must have at least one feature.');
                    }
                },
                
                moveFeature(index, direction) {
                    if (direction === 'up' && index > 0) {
                        [this.features[index], this.features[index - 1]] = [this.features[index - 1], this.features[index]];
                    } else if (direction === 'down' && index < this.features.length - 1) {
                        [this.features[index], this.features[index + 1]] = [this.features[index + 1], this.features[index]];
                    }
                }
            }
        }
        
    </script>
</x-layouts.dashboard>
