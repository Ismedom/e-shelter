<x-layouts.dashboard>
    @include('contents.tabs')

    <div class="max-w-full mx-auto">
        <x-form.card
            title="Features Section Configuration"
            description="Configure the features and capabilities section that will be displayed on your platform."
        >
            <form method="POST" action="{{ route('contents.features.store') }}" class="space-y-8" id="featureForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <x-form.section
                    title="Section Settings"
                    description="Configure the main title and background for the features section"
                    icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/></svg>'
                >
                    <x-form.grid columns="2">
                        <x-form.input
                            name="title"
                            label="Section Title"
                            placeholder="Enter the main section title"
                            :value="$content ? $content->title : ''"
                            required
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>'
                            help-text="This will be the main heading displayed above the features"
                        />

                        <x-form.input
                            name="description"
                            label="Description"
                            placeholder="Enter description text"
                            :value="$content ? ($content->content_data['description'] ?? '') : ''"
                            required
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/></svg>'
                            help-text="Brief description for the features section"
                        />
                    </x-form.grid>

                    <x-form.file-upload
                        name="background_image"
                        label="Background Image"
                        accept="image/*"
                        help-text="This image will be used as the background for the features section"
                        max-size="10MB"
                        placeholder="Upload a background image for the features section"
                        :current-file-url="$content ? ($content->content_data['background_image'] ?? null) : null"
                    />
                </x-form.section>

                <x-form.section
                    title="Features List"
                    description="Configure the individual features that will be displayed"
                    icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>'
                >
                    <div class="space-y-4" id="feature-items-container">
                    </div>

                    <div class="text-center">
                        <x-form.button
                            type="button"
                            variant="outline"
                            size="lg"
                            id="add-feature-button"
                            class="w-full border-2 border-dashed border-indigo-300 dark:border-indigo-700 text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300 hover:border-indigo-400 dark:hover:border-indigo-600"
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>'
                        >
                            Add New Feature
                        </x-form.button>
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
                            :value="$content ? ($content->content_data['settings']['layout_style'] ?? 'grid') : 'grid'"
                        />

                        <x-form.checkbox
                            name="show_icons"
                            label="Show feature icons"
                            :checked="$content ? ($content->content_data['settings']['show_icons'] ?? true) : true"
                            help-text="Display icons next to each feature"
                        />

                        <x-form.checkbox
                            name="is_active"
                            label="Display features section"
                            :checked="$content ? $content->is_active : true"
                            help-text="Toggle to show or hide the entire features section"
                        />
                    </x-form.grid>

                    <x-form.input
                        name="cta_text"
                        label="Call to Action Text"
                        placeholder="Enter call to action text"
                        :value="$content ? ($content->content_data['cta_text'] ?? 'Explore All Features') : 'Explore All Features'"
                        icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'
                        help-text="Text for the button below the features (leave empty to hide)"
                    />
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
        document.addEventListener('DOMContentLoaded', function () {
            const featureContainer = document.getElementById('feature-items-container');
            const addFeatureButton = document.getElementById('add-feature-button');

            let features = {!! json_encode($content ? ($content->content_data['features'] ?? []) : []) !!};

            function renderFeatures() {
                featureContainer.innerHTML = '';
                features.forEach((feature, index) => {
                    const featureItem = createFeatureItem(feature, index);
                    featureContainer.appendChild(featureItem);
                });
                updateButtonVisibility();
            }

            function createFeatureItem(feature, index) {
                const div = document.createElement('div');
                div.className = 'relative bg-gradient-to-br from-indigo-50 to-blue-50 dark:from-indigo-900/20 dark:to-blue-900/20 rounded-2xl border border-indigo-200 dark:border-indigo-800 p-4 shadow-lg feature-item';
                div.setAttribute('data-index', index);

                div.innerHTML = `
                    <div class="flex items-center gap-4">
                        <div class="flex-grow">
                            <div class="flex items-center gap-3">
                                <div class="flex-shrink-0 w-10 h-10 bg-indigo-100 dark:bg-indigo-800/40 rounded-lg flex items-center justify-center">
                                    <input
                                        type="text"
                                        name="features[${index}][icon]"
                                        placeholder="Icon class"
                                        value="${feature.icon || ''}"
                                        required
                                        class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 shadow-sm"
                                    />
                                </div>
                                <div class="flex-grow">
                                    <input
                                        type="text"
                                        name="features[${index}][title]"
                                        placeholder="Enter feature title"
                                        value="${feature.title || ''}"
                                        required
                                        class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 shadow-sm"
                                    />
                                    <textarea
                                        name="features[${index}][description]"
                                        rows="2"
                                        placeholder="Enter feature description"
                                        required
                                        class="w-full mt-2 px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 shadow-sm"
                                    >${feature.description || ''}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center gap-2">
                            <button
                                type="button"
                                class="p-2 text-gray-500 hover:text-indigo-600 transition-colors duration-200 move-up-button"
                                title="Move up"
                                ${index === 0 ? 'style="display:none;"' : ''}
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/>
                                </svg>
                            </button>

                            <button
                                type="button"
                                class="p-2 text-gray-500 hover:text-indigo-600 transition-colors duration-200 move-down-button"
                                title="Move down"
                                ${index === features.length - 1 ? 'style="display:none;"' : ''}
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>

                            <button
                                type="button"
                                class="p-2 text-red-500 hover:text-red-700 transition-colors duration-200 remove-feature-button"
                                title="Delete feature"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                `;
                return div;
            }

            function addFeature() {
                features.push({ icon: '', title: '', description: '' });
                renderFeatures();
            }

            function removeFeature(index) {
                features.splice(index, 1);
                renderFeatures();
            }

            function moveFeature(index, direction) {
                if (direction === 'up' && index > 0) {
                    [features[index], features[index - 1]] = [features[index - 1], features[index]];
                } else if (direction === 'down' && index < features.length - 1) {
                    [features[index], features[index + 1]] = [features[index + 1], features[index]];
                }
                renderFeatures();
            }

            function updateButtonVisibility() {
                const featureItems = featureContainer.querySelectorAll('.feature-item');
                featureItems.forEach((item, idx) => {
                    const moveUpBtn = item.querySelector('.move-up-button');
                    const moveDownBtn = item.querySelector('.move-down-button');

                    if (moveUpBtn) moveUpBtn.style.display = idx === 0 ? 'none' : 'inline-block';
                    if (moveDownBtn) moveDownBtn.style.display = idx === features.length - 1 ? 'none' : 'inline-block';
                });
            }

            addFeatureButton.addEventListener('click', addFeature);

            featureContainer.addEventListener('click', function (event) {
                const target = event.target.closest('button');
                if (!target) return;

                const featureItem = target.closest('.feature-item');
                if (!featureItem) return;

                const index = parseInt(featureItem.getAttribute('data-index'));

                if (target.classList.contains('remove-feature-button')) {
                    removeFeature(index);
                } else if (target.classList.contains('move-up-button')) {
                    moveFeature(index, 'up');
                } else if (target.classList.contains('move-down-button')) {
                    moveFeature(index, 'down');
                }
            });

            featureContainer.addEventListener('input', function(event) {
                const target = event.target;
                const featureItem = target.closest('.feature-item');
                if (!featureItem) return;

                const index = parseInt(featureItem.getAttribute('data-index'));
                if (target.name.includes('[icon]')) {
                    features[index].icon = target.value;
                } else if (target.name.includes('[title]')) {
                    features[index].title = target.value;
                } else if (target.name.includes('[description]')) {
                    features[index].description = target.value;
                }
            });

            renderFeatures();
        });

        function previewFeatures() {
            // Preview functionality would typically open a new tab or modal with your current features configuration.
        }
    </script>
</x-layouts.dashboard>