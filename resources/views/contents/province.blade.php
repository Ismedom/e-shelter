<x-layouts.dashboard>
    @include('contents.tabs')
    
    <div class="max-w-full mx-auto">
        <x-form.card 
            title="Province Section Configuration" 
            description="Configure the province statistics and information section that showcases your platform's geographical coverage across Cambodia."
        >
            <form method="POST" action="{{ route('contents.province.store') }}" class="space-y-8">
                @csrf
                @method('PUT')
                
                <x-form.section 
                    title="Province Statistics"
                    description="Configure the main statistics and messaging for your province coverage"
                    icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>'
                >
                    <x-form.grid columns="3">
                        <x-form.input 
                            name="province_count" 
                            label="Number of Provinces" 
                            placeholder="Enter number"
                            :value="$content ? $content->content_data['province_count'] : ''"
                            required 
                            type="number"
                            min="1"
                            max="25"
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/></svg>'
                            help-text="Total number of provinces covered by your platform"
                        />
                        
                        <x-form.input 
                            name="title" 
                            label="Section Title" 
                            placeholder="Enter title"
                            :value="$content ? $content->title : ''"
                            required 
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>'
                            help-text="Title that appears next to the number"
                        />
                        
                        <x-form.input 
                            name="subtitle" 
                            label="Subtitle" 
                            placeholder="Enter subtitle"
                            :value="$content ? $content->content_data['subtitle'] : ''"
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/></svg>'
                            help-text="Optional subtitle for additional context"
                        />
                    </x-form.grid>
                    
                    <x-form.textarea 
                        name="description" 
                        label="Description" 
                        placeholder="Enter description text"
                        rows="4"
                        required
                        :value="$content ? $content->content_data['description'] : ''"
                        help-text="Main description text that explains your province coverage"
                    ></x-form.textarea>
                </x-form.section>

                <x-form.section 
                    title="Visual Settings"
                    description="Configure how the province section appears visually"
                    icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>'
                >
                    <x-form.grid columns="2">
                        <x-form.select 
                            name="number_style" 
                            label="Number Display Style"
                            required
                            help-text="How to display the province number"
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/></svg>'
                            :options="[
                                ['value' => 'large', 'label' => 'Large Number'],
                                ['value' => 'highlighted', 'label' => 'Highlighted Number'],
                                ['value' => 'animated', 'label' => 'Animated Counter']
                            ]"
                            :value="$content ? $content->content_data['number_style'] : 'large'"
                        />
                        
                        <x-form.select 
                            name="layout_style" 
                            label="Layout Style"
                            required
                            help-text="Choose the overall layout arrangement"
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>'
                            :options="[
                                ['value' => 'centered', 'label' => 'Centered Layout'],
                                ['value' => 'left-aligned', 'label' => 'Left Aligned'],
                                ['value' => 'split', 'label' => 'Split Layout']
                            ]"
                            :value="$content ? $content->content_data['layout_style'] : 'centered'"
                        />
                    </x-form.grid>
                    
                    @if($content && isset($content->content_data['background_image']))
                    <div class="bg-gray-50 dark:bg-gray-800/50 rounded-2xl p-6 border border-gray-200 dark:border-gray-700">
                        <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-4">Current Background Image</h4>
                        <div class="flex items-center gap-6">
                            <img src="{{ asset($content->content_data['background_image']) }}" alt="Current Background Image" class="h-32 w-48 object-cover rounded-xl shadow-lg border border-gray-200 dark:border-gray-600">
                            <div class="flex-1 space-y-2">
                                <p class="text-sm text-gray-600 dark:text-gray-400">{{ basename($content->content_data['background_image']) }}</p>
                                <button type="button" class="text-sm text-red-600 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300">
                                    Remove Image
                                </button>
                            </div>
                        </div>
                    </div>
                    @endif
                    
                    <x-form.file-upload 
                        name="background_image" 
                        label="Background Image"
                        accept="image/*"
                        help-text="Optional background image for the province section"
                        max-size="5MB"
                        placeholder="Upload a background image (optional)"
                    />
                </x-form.section>

                <x-form.section 
                    title="Additional Statistics"
                    description="Add more statistics to showcase your platform's reach"
                    icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>'
                >
                    <x-form.grid columns="2">
                        <x-form.input 
                            name="cities_count" 
                            label="Number of Cities" 
                            placeholder="e.g., 150+"
                            :value="$content ? $content->content_data['cities_count'] : ''"
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-4m-5 0H3m2 0h4M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>'
                            help-text="Number of cities where you have properties"
                        />
                        
                        <x-form.input 
                            name="districts_count" 
                            label="Number of Districts" 
                            placeholder="e.g., 500+"
                            :value="$content ? $content->content_data['districts_count'] : ''"
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>'
                            help-text="Number of districts covered"
                        />
                    </x-form.grid>
                    
                    <x-form.grid columns="2">
                        <x-form.input 
                            name="coverage_percentage" 
                            label="Coverage Percentage" 
                            placeholder="e.g., 95%"
                            :value="$content ? $content->content_data['coverage_percentage'] : ''"
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>'
                            help-text="Percentage of Cambodia covered"
                        />
                        
                        <x-form.input 
                            name="tourist_destinations" 
                            label="Tourist Destinations" 
                            placeholder="e.g., 50+"
                            :value="$content ? $content->content_data['tourist_destinations'] : ''"
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'
                            help-text="Number of major tourist destinations"
                        />
                    </x-form.grid>
                </x-form.section>

                <x-form.section 
                    title="Display Settings"
                    description="Configure how the province section appears on your website"
                    icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>'
                >
                    <x-form.grid columns="3">
                        <x-form.checkbox 
                            name="is_active" 
                            label="Display province section"
                            :checked="$content ? $content->is_active : true"
                            help-text="Toggle to show or hide the province section"
                        />
                        
                        <x-form.checkbox 
                            name="show_additional_stats" 
                            label="Show additional statistics"
                            :checked="$content ? $content->content_data['show_additional_stats'] : true"
                            help-text="Display cities, districts, and other stats"
                        />
                        
                        <x-form.checkbox 
                            name="enable_counter_animation" 
                            label="Enable counter animation"
                            :checked="$content ? $content->content_data['enable_counter_animation'] : true"
                            help-text="Animate numbers when they come into view"
                        />
                    </x-form.grid>
                    
                    <x-form.grid columns="2">
                        <x-form.input 
                            name="cta_text" 
                            label="Call to Action Text" 
                            placeholder="Enter call to action text"
                            :value="$content ? $content->content_data['cta_text'] : ''"
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'
                            help-text="Text for the button below the statistics"
                        />
                        
                        <x-form.input 
                            name="cta_url" 
                            label="Call to Action URL" 
                            placeholder="Enter destination URL"
                            :value="$content ? $content->content_data['cta_url'] : ''"
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>'
                            help-text="Where the CTA button should redirect"
                        />
                    </x-form.grid>
                </x-form.section>
                
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
                        onclick="window.location.href='{{ route('contents.hero') }}'"
                        icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>'
                    >
                        Cancel
                    </x-form.button>
                </div>
            </form>
        </x-form.card>
    </div>
</x-layouts.dashboard>
