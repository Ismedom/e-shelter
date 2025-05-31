
@props([
    'type' => 'button',
    'variant' => 'primary',
    'size' => 'md',
    'disabled' => false,
    'loading' => false,
    'icon' => null,
    'iconPosition' => 'left',
    'showIcon' => true
])

@php
$baseClasses = 'inline-flex items-center justify-center font-semibold rounded-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-60 disabled:cursor-not-allowed';

$variants = [
    'primary' => 'bg-indigo-600 text-white hover:bg-indigo-700 focus:ring-indigo-500 dark:bg-indigo-600 dark:hover:bg-indigo-700',
    'secondary' => 'bg-gray-100 text-gray-900 hover:bg-gray-200 focus:ring-gray-500 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600',
    'outline' => 'border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 focus:ring-indigo-500',
    'danger' => 'bg-red-600 text-white hover:bg-red-700 focus:ring-red-500 dark:bg-red-600 dark:hover:bg-red-700',
    'success' => 'bg-green-600 text-white hover:bg-green-700 focus:ring-green-500 dark:bg-green-600 dark:hover:bg-green-700',
    'ghost' => 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-gray-500'
];

$sizes = [
    'sm' => 'px-3 py-2 text-sm',
    'md' => 'px-4 py-3 text-sm',
    'lg' => 'px-6 py-3 text-base',
    'xl' => 'px-8 py-4 text-lg'
];

$classes = $baseClasses . ' ' . $variants[$variant] . ' ' . $sizes[$size];
@endphp

<button 
    type="{{ $type }}" 
    class="{{ $classes }}"
    @if($disabled || $loading) disabled @endif
    {{ $attributes }}
>
    @if($loading)
        <svg class="w-4 h-4 mr-2 animate-spin" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
        Processing...
    @else
        @if($icon && $iconPosition === 'left' && $showIcon)
            <div class="mr-2 h-5 w-5">{!! $icon !!}</div>
        @endif
        
        {{ $slot }}
        
        @if($icon && $iconPosition === 'right' && $showIcon)
            <div class="ml-2 h-5 w-5">{!! $icon !!}</div>
        @endif
    @endif
</button>