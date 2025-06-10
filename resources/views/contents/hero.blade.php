<x-layouts.dashboard>
    @include('contents.tabs')
    
    <div class="max-w-full mx-auto">
        <x-form.card 
            title="Hero Section Configuration" 
            description="Configure the main hero section that appears at the top of your homepage to attract visitors and partners."
        >
            <form method="POST" action="{{ route('contents.hero.store') }}" class="space-y-8" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <x-form.section 
                    title="Hero Content"
                    description="Configure the main content and messaging for your hero section"
                    icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>'
                >
                    <x-form.grid columns="2">
                        <x-form.input 
                            name="title" 
                            label="Main Title" 
                            placeholder="Enter the main hero title"
                            :value="$content ? $content->title : ''"
                            required 
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>'
                            help-text="This will be the main headline displayed prominently"
                        />
                        
                        <x-form.input 
                            name="subtitle" 
                            label="Subtitle" 
                            placeholder="Enter subtitle text"
                            :value="$content ? $content->content_data['subtitle'] : ''"
                            required 
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/></svg>'
                            help-text="Supporting text that appears below the main title"
                        />
                    </x-form.grid>
                    
                    <x-form.textarea 
                        name="description" 
                        label="Description" 
                        placeholder="Enter a detailed description..."
                        rows="3"
                        :value="$content ? $content->content_data['description'] : ''"
                        help-text="Optional detailed description that provides more context"
                    ></x-form.textarea>
                </x-form.section>

                <x-form.section 
                    title="Hero Image"
                    description="Upload and configure the main hero image"
                    icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>'
                >
                    <div class="space-y-6">
                        @if($content && isset($content->content_data['background_image']))
                        <div class="bg-gray-50 dark:bg-gray-800/50 rounded-2xl p-6 border border-gray-200 dark:border-gray-700">
                            <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-4">Current Hero Image</h4>
                            <div class="flex items-center gap-6">
                                <img src="{{ asset($content->content_data['background_image']) }}" alt="Current Hero Image" class="h-32 w-48 object-cover rounded-xl shadow-lg border border-gray-200 dark:border-gray-600">
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
                            label="Upload New Hero Image"
                            accept="image/*"
                            help-text="Recommended size: 1920x1080px. This image will be the main background for your hero section."
                            max-size="10MB"
                            placeholder="Choose a high-quality image that represents your platform"
                        />
                    </div>
                </x-form.section>

                <x-form.section 
                    title="Statistics & Metrics"
                    description="Configure the key statistics displayed in the hero section"
                    icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>'
                >
                    <x-form.grid columns="2">
                        <x-form.input 
                            name="hotels_count" 
                            label="Hotels Count" 
                            placeholder="e.g., 1000+"
                            :value="$content ? $content->content_data['statistics']['hotels_count'] : '1000+'"
                            required 
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-4m-5 0H3m2 0h4M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>'
                            help-text="Number of hotels partnered with your platform"
                        />
                        
                        <x-form.input 
                            name="bookings_count" 
                            label="Bookings Count" 
                            placeholder="e.g., 2K+"
                            :value="$content ? $content->content_data['statistics']['bookings_count'] : '2K+'"
                            required 
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>'
                            help-text="Total number of bookings processed"
                        />
                    </x-form.grid>
                    
                    <x-form.grid columns="2">
                        <x-form.input 
                            name="revenue_generated" 
                            label="Revenue Generated" 
                            placeholder="e.g., $1M+"
                            :value="$content ? $content->content_data['statistics']['revenue_generated'] : '$1M+'"
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/></svg>'
                            help-text="Total revenue generated for partners"
                        />
                        
                        <x-form.input 
                            name="customer_satisfaction" 
                            label="Customer Satisfaction" 
                            placeholder="e.g., 98%"
                            :value="$content ? $content->content_data['statistics']['customer_satisfaction'] : '98%'"
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1m-6 4h8m-10 5a9 9 0 1118 0H3z"/></svg>'
                            help-text="Customer satisfaction rating"
                        />
                    </x-form.grid>
                </x-form.section>

                <x-form.section 
                    title="Call to Action"
                    description="Configure the primary action button and secondary options"
                    icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'
                >
                    <x-form.grid columns="2">
                        <x-form.input 
                            name="button_text" 
                            label="Button Text" 
                            placeholder="Enter button text"
                            :value="$content ? $content->content_data['button_text'] : ''"
                            required 
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'
                            help-text="Text for the main call-to-action button"
                        />
                        
                        <x-form.input 
                            name="button_url" 
                            label="Button URL" 
                            placeholder="Enter destination URL"
                            :value="$content ? $content->content_data['button_url'] : ''"
                            required 
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>'
                            help-text="Where the button should redirect users"
                        />
                    </x-form.grid>
                    
                    <x-form.grid columns="2">
                        <x-form.input 
                            name="secondary_button_text" 
                            label="Secondary Button Text" 
                            placeholder="Enter secondary button text"
                            :value="$content ? ($content->content_data['secondary_button_text'] ?? '') : ''"
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'
                            help-text="Text for the secondary button (optional)"
                        />
                        
                        <x-form.input 
                            name="secondary_button_url" 
                            label="Secondary Button URL" 
                            placeholder="Enter secondary URL"
                            :value="$content ? ($content->content_data['secondary_button_url'] ?? '') : ''"
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>'
                            help-text="Where the secondary button should redirect"
                        />
                    </x-form.grid>
                </x-form.section>

                <x-form.section 
                    title="Display Settings"
                    description="Configure how the hero section appears and behaves"
                    icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>'
                >
                    <x-form.grid columns="3">
                        <x-form.checkbox 
                            name="is_active" 
                            label="Display hero section"
                            :checked="$content ? $content->is_active : true"
                            help-text="Toggle to show or hide the hero section"
                        />
                        
                        <x-form.checkbox 
                            name="show_statistics" 
                            label="Show statistics"
                            :checked="$content ? $content->content_data['settings']['show_statistics'] : true"
                            help-text="Display the statistics/metrics in the hero"
                        />
                        
                        <x-form.checkbox 
                            name="enable_parallax" 
                            label="Enable parallax effect"
                            :checked="$content ? $content->content_data['settings']['enable_parallax'] : false"
                            help-text="Add parallax scrolling effect to the background"
                        />
                    </x-form.grid>
                    
                    <x-form.grid columns="2">
                        <x-form.select 
                            name="text_alignment" 
                            label="Text Alignment"
                            required
                            help-text="How to align the hero text content"
                            :value="$content ? $content->content_data['settings']['text_alignment'] : 'left'"
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16"/></svg>'
                            :options="[
                                ['value' => 'left', 'label' => 'Left Aligned'],
                                ['value' => 'center', 'label' => 'Center Aligned'],
                                ['value' => 'right', 'label' => 'Right Aligned']
                            ]"
                        />
                        
                        <x-form.select 
                            name="overlay_opacity" 
                            label="Background Overlay"
                            required
                            help-text="Darkness level of the overlay on the background image"
                            :value="$content ? $content->content_data['settings']['overlay_opacity'] : '0.5'"
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM7 3H5a2 2 0 00-2 2v12a4 4 0 004 4h2"/></svg>'
                            :options="[
                                ['value' => '0', 'label' => 'No Overlay'],
                                ['value' => '0.3', 'label' => 'Light (30%)'],
                                ['value' => '0.5', 'label' => 'Medium (50%)'],
                                ['value' => '0.7', 'label' => 'Dark (70%)']
                            ]"
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
                    
                    <x-form.button 
                        type="button" 
                        variant="secondary" 
                        size="lg"
                        onclick="previewHero()"
                        icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>'
                    >
                        Preview
                    </x-form.button>
                    
                    <x-form.button 
                        type="button" 
                        variant="secondary" 
                        size="lg"
                        onclick="resetToDefaults()"
                        icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>'
                    >
                        Reset to Defaults
                    </x-form.button>
                </div>
            </form>
        </x-form.card>
    </div>
    <script>
        function resetToDefaults() {
            if (confirm('Are you sure you want to reset all hero settings to default values? This action cannot be undone.')) {
                document.querySelector('input[name="title"]').value = 'Partner with Cambodia\'s Leading Hotel Platform';
                document.querySelector('input[name="subtitle"]').value = '1000+ hotels already earning more';
                document.querySelector('input[name="hotels_count"]').value = '1000+';
                document.querySelector('input[name="bookings_count"]').value = '2K+';
                document.querySelector('input[name="button_text"]').value = 'Join as Partner';
            }
        }
    </script>
</x-layouts.dashboard>
