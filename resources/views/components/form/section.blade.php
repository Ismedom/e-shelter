
@props([
    'title',
    'description' => null,
    'icon' => null,
    'showTitle' => true,
    'showDescription' => true,
    'showIcon' => true
])

<div class="space-y-6">
    @if(($title && $showTitle) || ($description && $showDescription))
        <div class="border-b border-gray-200 dark:border-gray-700 pb-4">
            <div class="flex items-center gap-3">
                @if($icon && $showIcon)
                    <div class="flex-shrink-0 w-8 h-8 bg-indigo-100 dark:bg-indigo-900/30 rounded-lg flex items-center justify-center">
                        <div class="h-5 w-5 text-indigo-600 dark:text-indigo-400">
                            {!! $icon !!}
                        </div>
                    </div>
                @endif
                <div>
                    @if($title && $showTitle)
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            {{ $title }}
                        </h3>
                    @endif
                    @if($description && $showDescription)
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">{{ $description }}</p>
                    @endif
                </div>
            </div>
        </div>
    @endif
    
    <div class="space-y-6">
        {{ $slot }}
    </div>
</div>
