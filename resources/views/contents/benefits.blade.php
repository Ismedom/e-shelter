<x-layouts.dashboard>
    @include('contents.tabs')
    
    <div class="max-w-full mx-auto">
        <x-form.card 
            title="Benefits Section Configuration" 
            description="Configure the benefits section that will be displayed to potential hosts on your platform."
        >
            <form method="POST" action="" class="space-y-8">
                @csrf
                @method('PUT')
                
                <x-form.section 
                    title="Section Header"
                    description="Configure the main title and introduction for the benefits section"
                    icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>'
                >
                    <x-form.input 
                        name="section_title" 
                        label="Section Title" 
                        placeholder="Enter the main section title"
                        value="Benefits for Hosts"
                        required 
                        icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>'
                        help-text="This will be the main heading displayed above the benefits"
                    />
                </x-form.section>

                <x-form.section 
                    title="Benefits Configuration"
                    description="Configure each benefit that will be displayed to hosts"
                    icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'
                >
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <div class="space-y-6 p-6 bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 rounded-2xl border border-blue-200 dark:border-blue-800">
                            <h3 class="text-lg font-semibold text-blue-800 dark:text-blue-200 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                Benefit 1
                            </h3>
                            
                            <x-form.input 
                                name="benefit_1_title" 
                                label="Title" 
                                placeholder="Enter benefit title"
                                value="Increased Visibility"
                                required 
                                icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>'
                            />
                            
                            <x-form.textarea 
                                name="benefit_1_description" 
                                label="Description" 
                                placeholder="Describe this benefit..."
                                rows="4"
                                required
                                help-text="Explain how this benefit helps hosts"
                            >List your property on Cambodia's fastest growing booking platform with exposure to local and international travelers</x-form.textarea>
                        </div>

                        <div class="space-y-6 p-6 bg-gradient-to-br from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 rounded-2xl border border-green-200 dark:border-green-800">
                            <h3 class="text-lg font-semibold text-green-800 dark:text-green-200 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                Benefit 2
                            </h3>
                            
                            <x-form.input 
                                name="benefit_2_title" 
                                label="Title" 
                                placeholder="Enter benefit title"
                                value="Simplified Management"
                                required 
                                icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/></svg>'
                            />
                            
                            <x-form.textarea 
                                name="benefit_2_description" 
                                label="Description" 
                                placeholder="Describe this benefit..."
                                rows="4"
                                required
                                help-text="Explain how this benefit helps hosts"
                            >Manage all bookings, payments, and inquiries through one easy-to-use dashboard designed for property owners</x-form.textarea>
                        </div>

                        <div class="space-y-6 p-6 bg-gradient-to-br from-purple-50 to-violet-50 dark:from-purple-900/20 dark:to-violet-900/20 rounded-2xl border border-purple-200 dark:border-purple-800">
                            <h3 class="text-lg font-semibold text-purple-800 dark:text-purple-200 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>
                                Benefit 3
                            </h3>
                            
                            <x-form.input 
                                name="benefit_3_title" 
                                label="Title" 
                                placeholder="Enter benefit title"
                                value="Local Support"
                                required 
                                icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg>'
                            />
                            
                            <x-form.textarea 
                                name="benefit_3_description" 
                                label="Description" 
                                placeholder="Describe this benefit..."
                                rows="4"
                                required
                                help-text="Explain how this benefit helps hosts"
                            >Access to 24/7 customer service in Khmer and English to speak with any questions or issues</x-form.textarea>
                        </div>

                        <div class="space-y-6 p-6 bg-gradient-to-br from-orange-50 to-red-50 dark:from-orange-900/20 dark:to-red-900/20 rounded-2xl border border-orange-200 dark:border-orange-800">
                            <h3 class="text-lg font-semibold text-orange-800 dark:text-orange-200 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                                </svg>
                                Benefit 4
                            </h3>
                            
                            <x-form.input 
                                name="benefit_4_title" 
                                label="Title" 
                                placeholder="Enter benefit title"
                                value="Commission Structure"
                                required 
                                icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/></svg>'
                            />
                            
                            <x-form.textarea 
                                name="benefit_4_description" 
                                label="Description" 
                                placeholder="Describe this benefit..."
                                rows="4"
                                required
                                help-text="Explain how this benefit helps hosts"
                            >Competitive commission rates and transparent payment processing with fast payouts</x-form.textarea>
                        </div>
                    </div>
                </x-form.section>

                <x-form.section 
                    title="Display Settings"
                    description="Configure how the benefits section appears on your website"
                    icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>'
                >
                    <x-form.grid columns="2">
                        <x-form.checkbox 
                            name="is_active" 
                            label="Display benefits section on website"
                            :checked="true"
                            help-text="Toggle to show or hide the entire benefits section"
                        />
                        
                        <x-form.checkbox 
                            name="show_icons" 
                            label="Show benefit icons"
                            :checked="true"
                            help-text="Display decorative icons next to each benefit"
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
                        onclick="previewBenefits()"
                        icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>'
                    >
                        Preview
                    </x-form.button>
                </div>
            </form>
        </x-form.card>
    </div>

</x-layouts.dashboard>
