
@props([
    'title',
    'description',
    'actionText' => null,
    'actionUrl' => null,
    'icon' => null
])

<div class="col-span-full">
    <x-form.card class="text-center py-12">
        <div class="flex flex-col items-center">
            @if($icon)
                <div class="mb-4">
                    {!! $icon !!}
                </div>
            @else
                <svg class="mx-auto h-16 w-16 text-gray-400 dark:text-gray-500 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
            @endif
            
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">{{ $title }}</h3>
            <p class="text-gray-600 dark:text-gray-400 mb-6 max-w-md">{{ $description }}</p>
            
            @if($actionText && $actionUrl)
                <x-form.button 
                    type="button"
                    variant="primary" 
                    size="lg"
                    onclick="window.location.href='{{ $actionUrl }}'"
                    icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>'
                >
                    {{ $actionText }}
                </x-form.button>
            @endif
        </div>
    </x-form.card>
</div>