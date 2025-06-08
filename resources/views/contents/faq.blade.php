<x-layouts.dashboard>
    @include('contents.tabs')

    <div class="max-w-full mx-auto">
        <x-form.card
            title="FAQ Section Configuration"
            description="Configure the frequently asked questions section that will be displayed to visitors on your platform."
        >
            <form method="POST" action="{{ route('contents.faq.store') }}" class="space-y-8" id="faqForm">
                @csrf
                @method('PUT')

                <x-form.section
                    title="Section Header"
                    description="Configure the main title and introduction text for the FAQ section"
                    icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'
                >
                    <x-form.grid columns="2">
                        <x-form.input
                            name="title"
                            label="Section Title"
                            placeholder="Enter the main section title"
                            :value="$content ? $content->title : ''"
                            required
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>'
                            help-text="This will be the main heading displayed above the FAQ section"
                        />

                        <x-form.input
                            name="description"
                            label="Introduction Text"
                            placeholder="Enter introduction text"
                            :value="$content ? ($content->content_data['description'] ?? '') : ''"
                            required
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/></svg>'
                            help-text="Brief description or subtitle for the FAQ section"
                        />
                    </x-form.grid>
                </x-form.section>

                <x-form.section
                    title="FAQ Items"
                    description="Configure individual frequently asked questions and their answers"
                    icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'
                >
                    <div class="space-y-6" id="faq-items-container">
                    </div>

                    <div class="text-center">
                        <x-form.button
                            type="button"
                            variant="outline"
                            size="lg"
                            id="add-faq-button"
                            class="w-full border-2 border-dashed border-blue-300 dark:border-blue-700 text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 hover:border-blue-400 dark:hover:border-blue-600"
                            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>'
                        >
                            Add New FAQ
                        </x-form.button>
                    </div>
                </x-form.section>

                <x-form.section
                    title="Display Settings"
                    description="Configure how the FAQ section appears on your website"
                    icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>'
                >
                    <x-form.grid columns="3">
                        <x-form.checkbox
                            name="is_active"
                            label="Display FAQ section on website"
                            :checked="$content ? $content->is_active : true"
                            help-text="Toggle to show or hide the entire FAQ section"
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
            const faqContainer = document.getElementById('faq-items-container');
            const addFaqButton = document.getElementById('add-faq-button');

            let faqs = {!! json_encode($content ? ($content->content_data['faqs'] ?? []) : []) !!};

            function renderFaqs() {
                faqContainer.innerHTML = '';
                faqs.forEach((faq, index) => {
                    const faqItem = createFaqItem(faq, index);
                    faqContainer.appendChild(faqItem);
                });
                updateButtonVisibility();
            }

            function createFaqItem(faq, index) {
                const div = document.createElement('div');
                div.className = 'relative bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 rounded-2xl border border-blue-200 dark:border-blue-800 p-6 shadow-lg faq-item';
                div.setAttribute('data-index', index);

                div.innerHTML = `
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-semibold text-blue-800 dark:text-blue-200 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span>FAQ ${index + 1}</span>
                        </h3>

                        <div class="flex items-center space-x-2">
                            <button
                                type="button"
                                class="p-2 text-gray-500 hover:text-blue-600 transition-colors duration-200 move-up-button"
                                title="Move up"
                                ${index === 0 ? 'style="display:none;"' : ''}
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/>
                                </svg>
                            </button>

                            <button
                                type="button"
                                class="p-2 text-gray-500 hover:text-blue-600 transition-colors duration-200 move-down-button"
                                title="Move down"
                                ${index === faqs.length - 1 ? 'style="display:none;"' : ''}
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>

                            <button
                                type="button"
                                class="p-2 text-red-500 hover:text-red-700 transition-colors duration-200 remove-faq-button"
                                title="Delete FAQ"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Question</label>
                            <input
                                type="text"
                                name="faqs[${index}][question]"
                                placeholder="Enter the question"
                                value="${faq.question || ''}"
                                required
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 shadow-sm"
                            />
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Answer</label>
                            <textarea
                                name="faqs[${index}][answer]"
                                rows="3"
                                placeholder="Enter the answer"
                                required
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 shadow-sm"
                            >${faq.answer || ''}</textarea>
                        </div>
                    </div>
                `;
                return div;
            }

            function addFaq() {
                faqs.push({ question: '', answer: '' });
                renderFaqs();
            }

            function removeFaq(index) {
                faqs.splice(index, 1);
                renderFaqs();
            }

            function moveFaq(index, direction) {
                if (direction === 'up' && index > 0) {
                    [faqs[index], faqs[index - 1]] = [faqs[index - 1], faqs[index]];
                } else if (direction === 'down' && index < faqs.length - 1) {
                    [faqs[index], faqs[index + 1]] = [faqs[index + 1], faqs[index]];
                }
                renderFaqs();
            }

            function updateButtonVisibility() {
                const faqItems = faqContainer.querySelectorAll('.faq-item');
                faqItems.forEach((item, idx) => {
                    const moveUpBtn = item.querySelector('.move-up-button');
                    const moveDownBtn = item.querySelector('.move-down-button');

                    if (moveUpBtn) moveUpBtn.style.display = idx === 0 ? 'none' : 'inline-block';
                    if (moveDownBtn) moveDownBtn.style.display = idx === faqs.length - 1 ? 'none' : 'inline-block';
                });
            }

            addFaqButton.addEventListener('click', addFaq);

            faqContainer.addEventListener('click', function (event) {
                const target = event.target.closest('button');
                if (!target) return;
                const faqItem = target.closest('.faq-item');
                if (!faqItem) return;

                const index = parseInt(faqItem.getAttribute('data-index'));

                if (target.classList.contains('remove-faq-button')) {
                    removeFaq(index);
                } else if (target.classList.contains('move-up-button')) {
                    moveFaq(index, 'up');
                } else if (target.classList.contains('move-down-button')) {
                    moveFaq(index, 'down');
                }
            });

            faqContainer.addEventListener('input', function(event) {
                const target = event.target;
                const faqItem = target.closest('.faq-item');
                if (!faqItem) return;

                const index = parseInt(faqItem.getAttribute('data-index'));
                if (target.name.includes('[question]')) {
                    faqs[index].question = target.value;
                } else if (target.name.includes('[answer]')) {
                    faqs[index].answer = target.value;
                }
            });


            renderFaqs();
        });
    </script>
</x-layouts.dashboard>