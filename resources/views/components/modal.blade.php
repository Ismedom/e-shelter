@props([
    'id' => 'modal',
    'title' => 'Confirm Action',
    'description' => null,
    'type' => 'info',
    'size' => 'md',
    'confirmText' => 'Confirm',
    'cancelText' => 'Cancel', 
    'confirmAction' => null,
    'showCancel' => true,
])

@php
    $typeConfig = [
        'danger' => [
            'icon' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/></svg>',
            'iconBg' => 'bg-red-100 dark:bg-red-900/30',
            'iconColor' => 'text-red-600 dark:text-red-400',
            'buttonVariant' => 'danger'
        ],
        'warning' => [
            'icon' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M19 10a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>',
            'iconBg' => 'bg-yellow-100 dark:bg-yellow-900/30',
            'iconColor' => 'text-yellow-600 dark:text-yellow-400',
            'buttonVariant' => 'warning'
        ],
        'success' => [
            'icon' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>',
            'iconBg' => 'bg-green-100 dark:bg-green-900/30',
            'iconColor' => 'text-green-600 dark:text-green-400',
            'buttonVariant' => 'success'
        ],
        'info' => [
            'icon' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>',
            'iconBg' => 'bg-blue-100 dark:bg-blue-900/30',
            'iconColor' => 'text-blue-600 dark:text-blue-400',
            'buttonVariant' => 'primary'
        ]
    ];

    $sizeConfig = [
        'sm' => 'max-w-sm',
        'md' => 'max-w-md', 
        'lg' => 'max-w-lg',
        'xl' => 'max-w-xl'
    ];

    $config = $typeConfig[$type] ?? $typeConfig['info'];
    $maxWidth = $sizeConfig[$size] ?? $sizeConfig['md'];
@endphp

<div id="{{ $id }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full" data-modal-backdrop="static">
    <div class="fixed inset-0 bg-black/20 backdrop-blur-sm transition-opacity duration-300" data-modal-hide="{{ $id }}"></div>
    <div class="relative p-4 w-full {{ $maxWidth }} max-h-full z-10">
        <div class="relative bg-white rounded-xl shadow-2xl dark:bg-gray-800 border border-gray-200 dark:border-gray-700">
            <button
             onclick="document.getElementById('{{ $id }}').classList.add('hidden')"
             type="button" class="absolute top-4 end-4 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white transition-colors duration-200" data-modal-hide="{{ $id }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            
            <div class="p-6 pb-4">
                <div class="flex items-center gap-4">
                    <div class="flex-shrink-0 w-12 h-12 {{ $config['iconBg'] }} rounded-xl flex items-center justify-center">
                        <div class="w-6 h-6 {{ $config['iconColor'] }}">
                            {!! $config['icon'] !!}
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                            {{ $title }}
                        </h3>
                        @if($description)
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                {{ $description }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>

            @if(trim($slot ?? ''))
                <div class="px-6 pb-6">
                    {{ $slot }}
                </div>
            @endif

            <div class="flex flex-col sm:flex-row gap-3 p-6 pb-4 dark:border-gray-700">
                <x-form.button 
                    type="submit" 
                    :variant="$config['buttonVariant']" 
                    size="md"
                    data-modal-hide="{{ $id }}"
                    class="flex-1 sm:flex-none"
                    icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>'
                >
                    {{ $confirmText }}
                </x-form.button>
                
                @if($showCancel)
                    <x-form.button 
                        type="button" 
                        variant="outline" 
                        size="md"
                        data-modal-hide="{{ $id }}"
                        onclick="document.getElementById('{{ $id }}').classList.add('hidden')"
                        class="flex-1 sm:flex-none"
                        icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>'
                    >
                        {{ $cancelText }}
                    </x-form.button>
                @endif
            </div>
        </div>
    </div>
</div>