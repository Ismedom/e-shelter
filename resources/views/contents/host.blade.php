<x-layouts.dashboard>
    @include('contents.tabs')

    <div class="max-w-full mx-auto">
        <x-form.card
            title="Host Services Configuration"
            description="Configure the host services section that showcases the benefits and features available to property hosts on your platform."
        >
            <form method="POST" action="{{ route('contents.host.store') }}" class="space-y-8" id="hostServicesForm">
                @csrf
                @method('PUT')

                <x-form.section
                    title="Section Header"
                    description="Configure the main title and introduction for the host services section"
                    icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5"/></svg>'
                >
                    <x-form.grid columns="2">
                        <x-form.input
                            name="title"
                            label="Section Title"
                            placeholder="Enter the main section title"
                            :value="$content ? $content->title : ''"
                            required
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>'
                            help-text="This will be the main heading displayed above the services"
                        />

                        <x-form.input
                            name="subtitle"
                            label="Subtitle"
                            placeholder="Enter subtitle text"
                            :value="$content ? $content->content_data['subtitle'] : ''"
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
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8" id="host-services-container">
                    </div>

                    <div class="text-center mt-8">
                        <x-form.button
                            type="button"
                            variant="outline"
                            size="lg"
                            id="add-service-button"
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
                            :checked="$content ? $content->is_active : true"
                            help-text="Toggle to show or hide the entire services section"
                        />

                        <x-form.checkbox
                            name="show_icons"
                            label="Show service icons"
                            :checked="$content ? $content->content_data['show_icons'] : true"
                            help-text="Display icons for each service"
                        />

                        <x-form.checkbox
                            name="enable_animations"
                            label="Enable animations"
                            :checked="$content ? $content->content_data['enable_animations'] : true"
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
                            :value="$content ? $content->content_data['layout_style'] : 'grid'"
                        />

                        <x-form.input
                            name="cta_text"
                            label="Call to Action Text"
                            placeholder="Enter call to action text"
                            :value="$content ? $content->content_data['cta_text'] : ''"
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'
                            help-text="Text for the call to action button"
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
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const servicesContainer = document.getElementById('host-services-container');
            const addServiceButton = document.getElementById('add-service-button');

            let services = {!! json_encode($content ? ($content->content_data['services'] ?? []) : []) !!};

            function renderServices() {
                servicesContainer.innerHTML = '';
                services.forEach((service, index) => {
                    const serviceItem = createServiceItem(service, index);
                    servicesContainer.appendChild(serviceItem);
                });
                updateButtonVisibility();
            }

            function createServiceItem(service, index) {
                const div = document.createElement('div');
                div.className = 'space-y-6 p-6 bg-gradient-to-br from-amber-50 to-yellow-50 dark:from-amber-900/20 dark:to-yellow-900/20 rounded-2xl border border-amber-200 dark:border-amber-800 service-item';
                div.setAttribute('data-index', index);

                div.innerHTML = `
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-amber-800 dark:text-amber-200 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5"/>
                            </svg>
                            <span>Service ${index + 1}</span>
                        </h3>

                        <div class="flex items-center space-x-2">
                            <button
                                type="button"
                                class="p-2 text-gray-500 hover:text-amber-600 transition-colors duration-200 move-up-button"
                                title="Move up"
                                ${index === 0 ? 'style="display:none;"' : ''}
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/>
                                </svg>
                            </button>

                            <button
                                type="button"
                                class="p-2 text-gray-500 hover:text-amber-600 transition-colors duration-200 move-down-button"
                                title="Move down"
                                ${index === services.length - 1 ? 'style="display:none;"' : ''}
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>

                            <button
                                type="button"
                                class="p-2 text-red-500 hover:text-red-700 transition-colors duration-200 remove-service-button"
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
                                name="services[${index}][title]"
                                placeholder="Enter service title"
                                value="${service.title || ''}"
                                required
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all duration-200 shadow-sm"
                            />
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Description</label>
                            <textarea
                                name="services[${index}][description]"
                                rows="5"
                                placeholder="Enter service description"
                                required
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all duration-200 shadow-sm"
                            >${service.description || ''}</textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Icon</label>
                            <select
                                name="services[${index}][icon]"
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all duration-200 shadow-sm"
                            >
                                <option value="booking" ${service.icon === 'booking' ? 'selected' : ''}>📅 Booking</option>
                                <option value="revenue" ${service.icon === 'revenue' ? 'selected' : ''}>💰 Revenue</option>
                                <option value="global" ${service.icon === 'global' ? 'selected' : ''}>🌍 Global Reach</option>
                                <option value="support" ${service.icon === 'support' ? 'selected' : ''}>🎧 Support</option>
                                <option value="analytics" ${service.icon === 'analytics' ? 'selected' : ''}>📊 Analytics</option>
                                <option value="marketing" ${service.icon === 'marketing' ? 'selected' : ''}>📢 Marketing</option>
                            </select>
                        </div>
                    </div>
                `;
                return div;
            }

            function addService() {
                services.push({ title: '', description: '', icon: 'booking' });
                renderServices();
            }

            function removeService(index) {
                if (confirm('Are you sure you want to remove this service?')) {
                    services.splice(index, 1);
                    renderServices();
                }
            }

            function moveService(index, direction) {
                const newIndex = direction === 'up' ? index - 1 : index + 1;
                if (newIndex >= 0 && newIndex < services.length) {
                    [services[index], services[newIndex]] = [services[newIndex], services[index]];
                    renderServices();
                }
            }

            function updateButtonVisibility() {
                const serviceItems = servicesContainer.querySelectorAll('.service-item');
                serviceItems.forEach((item, idx) => {
                    const moveUpBtn = item.querySelector('.move-up-button');
                    const moveDownBtn = item.querySelector('.move-down-button');

                    if (moveUpBtn) moveUpBtn.style.display = idx === 0 ? 'none' : 'inline-block';
                    if (moveDownBtn) moveDownBtn.style.display = idx === services.length - 1 ? 'none' : 'inline-block';
                });
            }

            addServiceButton.addEventListener('click', addService);

            servicesContainer.addEventListener('click', function (event) {
                const target = event.target.closest('button');
                if (!target) return;

                const serviceItem = target.closest('.service-item');
                if (!serviceItem) return;

                const index = parseInt(serviceItem.getAttribute('data-index'));

                if (target.classList.contains('remove-service-button')) {
                    removeService(index);
                } else if (target.classList.contains('move-up-button')) {
                    moveService(index, 'up');
                } else if (target.classList.contains('move-down-button')) {
                    moveService(index, 'down');
                }
            });

            servicesContainer.addEventListener('input', function(event) {
                const target = event.target;
                const serviceItem = target.closest('.service-item');
                if (!serviceItem) return;

                const index = parseInt(serviceItem.getAttribute('data-index'));
                if (target.name.includes('[title]')) {
                    services[index].title = target.value;
                } else if (target.name.includes('[description]')) {
                    services[index].description = target.value;
                } else if (target.name.includes('[icon]')) {
                    services[index].icon = target.value;
                }
            });

            renderServices();
        });
    </script>
</x-layouts.dashboard>