
@props(['href'])

<div class="bg-white dark:bg-gray-800 border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg hover:border-indigo-400 dark:hover:border-indigo-500 transition-colors duration-200">
    <div class="p-8 text-center">
        <div class="flex items-center justify-center h-16 w-16 mx-auto mb-4 bg-indigo-100 dark:bg-indigo-900/30 rounded-full">
            <svg class="w-8 h-8 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
            </svg>
        </div>
        
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Add New Hotel</h3>
        <p class="text-gray-600 dark:text-gray-400 mb-6">Create a new hotel listing with details, amenities, and availability settings.</p>
        
        <x-form.button 
            type="button"
            variant="primary" 
            size="md"
            onclick="window.location.href='{{ $href }}'"
            icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>'
        >
            Get Started
        </x-form.button>
    </div>
</div>


<div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
    @if(!$accommodations->isEmpty())
        @foreach ($accommodations as $accommodation)
            <x-accommodation-card :accommodation="$accommodation" />
        @endforeach
        
        <x-add-hotel-card href="{{ route('accommodations.create') }}" />
    @else
        <x-empty-state 
            title="No accommodations found"
            description="Get started by creating your first accommodation listing."
            action-text="Add New Hotel"
            action-url="{{ route('accommodations.create') }}"
        />
    @endif
</div>
