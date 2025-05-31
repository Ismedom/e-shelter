<x-layouts.dashboard>
    @include('contents.tabs')
    
    <div class="max-w-full mx-auto">
        <x-form.card 
            title="Host Services Configuration" 
            description="Configure the host services section that showcases the benefits and features available to property hosts on your platform."
        >
            <form method="POST" action="" class="space-y-8" x-data="hostServicesManager()">
                @csrf
                @method('PUT')
                
                <x-form.section 
                    title="Section Header"
                    description="Configure the main title and introduction for the host services section"
                    icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5"/></svg>'
                >
                    <x-form.grid columns="2">
                        <x-form.input 
                            name="section_title" 
                            label="Section Title" 
                            placeholder="Enter the main section title"
                            value="Host a Cambodia services"
                            required 
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>'
                            help-text="This will be the main heading displayed above the services"
                        />
                        
                        <x-form.input 
                            name="subtitle" 
                            label="Subtitle" 
                            placeholder="Enter subtitle text"
                            value="Discover the benefits of hosting with us"
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/></svg>'
                            help-text="Brief description or subtitle for the services section"
                        />
                    </x-form.grid>
                </x-form.section>

                <x-form.section 
                    title="Host Services"
                    description="Configure the individual services and benefits offered to hosts"
                    icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'
                >
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        <template x-for="(service, index) in services" :key="index">
                            <div class="space-y-6 p-6 bg-gradient-to-br from-amber-50 to-yellow-50 dark:from-amber-900/20 dark:to-yellow-900/20 rounded-2xl border border-amber-200 dark:border-amber-800">
                                <div class="flex items-center justify-between mb-4">
                                    <h3 class="text-lg font-semibold text-amber-800 dark:text-amber-200 flex items-center">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5"/>
                                        </svg>
                                        <span x-text="`Service ${index + 1}`"></span>
                                    </h3>
                                    
                                    <div class="flex items-center space-x-2">
                                        <button 
                                            type="button" 
                                            @click="moveService(index, 'up')"
                                            x-show="index > 0"
                                            class="p-2 text-gray-500 hover:text-amber-600 transition-colors duration-200"
                                            title="Move up"
                                        >
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/>
                                            </svg>
                                        </button>
                                        
                                        <button 
                                            type="button" 
                                            @click="moveService(index, 'down')"
                                            x-show="index < services.length - 1"
                                            class="p-2 text-gray-500 hover:text-amber-600 transition-colors duration-200"
                                            title="Move down"
                                        >
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                            </svg>
                                        </button>
                                        
                                        <button 
                                            type="button" 
                                            @click="removeService(index)"
                                            class="p-2 text-red-500 hover:text-red-700 transition-colors duration-200"
                                            title="Delete service"
                                        >
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Title</label>
                                        <input 
                                            type="text" 
                                            x-model="service.title"
                                            :name="`services[${index}][title]`"
                                            placeholder="Enter service title"
                                            required
                                            class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all duration-200 shadow-sm"
                                        />
                                    </div>
                                    
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Description</label>
                                        <textarea 
                                            x-model="service.description"
                                            :name="`services[${index}][description]`"
                                            rows="5"
                                            placeholder="Enter service description"
                                            required
                                            class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all duration-200 shadow-sm"
                                        ></textarea>
                                    </div>
                                    
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Icon</label>
                                        <select 
                                            x-model="service.icon"
                                            :name="`services[${index}][icon]`"
                                            class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all duration-200 shadow-sm"
                                        >
                                            <option value="booking">📅 Booking</option>
                                            <option value="revenue">💰 Revenue</option>
                                            <option value="global">🌍 Global Reach</option>
                                            <option value="support">🎧 Support</option>
                                            <option value="analytics">📊 Analytics</option>
                                            <option value="marketing">📢 Marketing</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                    
                    <div class="text-center mt-8">
                        <x-form.button 
                            type="button" 
                            variant="outline" 
                            size="lg"
                            @click="addService()"
                            class="w-full border-2 border-dashed border-amber-300 dark:border-amber-700 text-amber-600 dark:text-amber-400 hover:text-amber-700 dark:hover:text-amber-300 hover:border-amber-400 dark:hover:border-amber-600"
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>'
                        >
                            Add New Service
                        </x-form.button>
                    </div>
                </x-form.section>

                <x-form.section 
                    title="Display Settings"
                    description="Configure how the host services section appears on your website"
                    icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>'
                >
                    <x-form.grid columns="3">
                        <x-form.checkbox 
                            name="is_active" 
                            label="Display services section"
                            :checked="true"
                            help-text="Toggle to show or hide the entire services section"
                        />
                        
                        <x-form.checkbox 
                            name="show_icons" 
                            label="Show service icons"
                            :checked="true"
                            help-text="Display icons for each service"
                        />
                        
                        <x-form.checkbox 
                            name="enable_animations" 
                            label="Enable animations"
                            :checked="true"
                            help-text="Add entrance animations to service cards"
                        />
                    </x-form.grid>
                    
                    <x-form.grid columns="2">
                        <x-form.select 
                            name="layout_style" 
                            label="Layout Style"
                            required
                            help-text="Choose how services will be displayed"
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>'
                            :options="[
                                ['value' => 'grid', 'label' => 'Grid Layout'],
                                ['value' => 'carousel', 'label' => 'Carousel Layout'],
                                ['value' => 'masonry', 'label' => 'Masonry Layout']
                            ]"
                        />
                        
                        <x-form.input 
                            name="cta_text" 
                            label="Call to Action Text" 
                            placeholder="Enter call to action text"
                            value="Start Hosting Today"
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'
                            help-text="Text for the button below the services (leave empty to hide)"
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
                        onclick="window.location.href='{{ route('contents.index') }}'"
                        icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>'
                    >
                        Cancel
                    </x-form.button>
                    
                    <x-form.button 
                        type="button" 
                        variant="secondary" 
                        size="lg"
                        onclick="previewServices()"
                        icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>'
                    >
                        Preview
                    </x-form.button>
                    
                    <x-form.button 
                        type="button" 
                        variant="secondary" 
                        size="lg"
                        @click="resetToDefaults()"
                        icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>'
                    >
                        Reset to Defaults
                    </x-form.button>
                </div>
            </form>
        </x-form.card>
    </div>

    <script>
        function hostServicesManager() {
            return {
                services: [
                    {
                        title: "2K + Booking",
                        description: "Connect with over 2,000 monthly travelers seeking authentic Cambodian accommodations",
                        icon: "booking"
                    },
                    {
                        title: "20+ Monthly Bookings",
                        description: "Average 20+ bookings per month for listed properties on our platform",
                        icon: "revenue"
                    },
                    {
                        title: "Global Exposure",
                        description: "Global exposure to 20+ international booking channels through our single platform",
                        icon: "global"
                    }
                ],
                
                addService() {
                    this.services.push({
                        title: "",
                        description: "",
                        icon: "booking"
                    });
                },
                
                removeService(index) {
                    if (this.services.length > 1) {
                        this.services.splice(index, 1);
                    } else {
                       // alert('You must have at least one service.');
                    }
                },
                
                moveService(index, direction) {
                    if (direction === 'up' && index > 0) {
                        [this.services[index], this.services[index - 1]] = [this.services[index - 1], this.services[index]];
                    } else if (direction === 'down' && index < this.services.length - 1) {
                        [this.services[index], this.services[index + 1]] = [this.services[index + 1], this.services[index]];
                    }
                },
                
                resetToDefaults() {
                    if (confirm('Are you sure you want to reset all services to default values? This action cannot be undone.')) {
                        this.services = [
                            {
                                title: "2K + Booking",
                                description: "Connect with over 2,000 monthly travelers seeking authentic Cambodian accommodations",
                                icon: "booking"
                            },
                            {
                                title: "20+ Monthly Bookings",
                                description: "Average 20+ bookings per month for listed properties on our platform",
                                icon: "revenue"
                            },
                            {
                                title: "Global Exposure",
                                description: "Global exposure to 20+ international booking channels through our single platform",
                                icon: "global"
                            }
                        ];
                    }
                }
            }
        }
    </script>
</x-layouts.dashboard>
