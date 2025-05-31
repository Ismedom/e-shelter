
@props(['accommodations'])

@php
$totalAccommodations = $accommodations->count();
$activeAccommodations = $accommodations->where('is_active', true)->count();
$inactiveAccommodations = $accommodations->where('is_active', false)->count();
@endphp

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <x-form.card padding="md" class="text-center">
        <div class="flex items-center justify-center w-12 h-12 mx-auto mb-3 bg-indigo-100 dark:bg-indigo-900/30 rounded-full">
            <svg class="w-6 h-6 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
            </svg>
        </div>
        <h3 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $totalAccommodations }}</h3>
        <p class="text-gray-600 dark:text-gray-400">Total Hotels</p>
    </x-form.card>
    
    <x-form.card padding="md" class="text-center">
        <div class="flex items-center justify-center w-12 h-12 mx-auto mb-3 bg-green-100 dark:bg-green-900/30 rounded-full">
            <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>
        <h3 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $activeAccommodations }}</h3>
        <p class="text-gray-600 dark:text-gray-400">Active Hotels</p>
    </x-form.card>
    
    <x-form.card padding="md" class="text-center">
        <div class="flex items-center justify-center w-12 h-12 mx-auto mb-3 bg-red-100 dark:bg-red-900/30 rounded-full">
            <svg class="w-6 h-6 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>
        <h3 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $inactiveAccommodations }}</h3>
        <p class="text-gray-600 dark:text-gray-400">Inactive Hotels</p>
    </x-form.card>
</div>