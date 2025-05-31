
@props([
    'title' => null,
    'description' => null,
    'padding' => 'lg',
    'showTitle' => true,
    'showDescription' => true
])

@php
$paddingClasses = [
    'sm' => 'p-4',
    'md' => 'p-6',
    'lg' => 'p-8',
    'xl' => 'p-10'
];
@endphp

<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 {{ $paddingClasses[$padding] }}">
    @if(($title && $showTitle) || ($description && $showDescription))
        <div class="mb-8">
            @if($title && $showTitle)
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $title }}</h2>
            @endif
            @if($description && $showDescription)
                <p class="mt-2 text-gray-600 dark:text-gray-400">{{ $description }}</p>
            @endif
        </div>
    @endif
    
    {{ $slot }}
</div>