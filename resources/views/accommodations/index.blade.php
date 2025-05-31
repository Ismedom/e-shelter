<x-layouts.dashboard>
    <div class="max-w-full ">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Accommodations</h1>
                <p class="text-gray-600 dark:text-gray-400 mt-1">Manage your hotel listings and details.</p>
            </div>
            <x-form.button 
                type="button"
                variant="primary" 
                size="lg"
                onclick="window.location.href='{{ route('accommodations.create') }}'"
                icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>'
            >
                Add New Hotel
            </x-form.button>
        </div>

        @if(!$accommodations->isEmpty())
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($accommodations as $accommodation)
                    <x-accommodation-card :accommodation="$accommodation" />
                @endforeach
            </div>
        @else
            <x-empty-state 
                title="No accommodations found"
                description="Get started by creating your first accommodation listing."
                action-text="Add New Hotel"
                action-url="{{ route('accommodations.create') }}"
            />
        @endif
    </div>
</x-layouts.dashboard>