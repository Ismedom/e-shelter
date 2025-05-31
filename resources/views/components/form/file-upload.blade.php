
@props([
    'name',
    'label' => null,
    'accept' => null,
    'required' => false,
    'helpText' => null,
    'multiple' => false,
    'maxSize' => '2MB',
    'disabled' => false,
    'showLabel' => true
])

@php
$hasError = $errors->has($name);
$fileClasses = "block w-full pl-3 pr-3 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 dark:file:bg-indigo-900/30 dark:file:text-indigo-300 dark:hover:file:bg-indigo-900/50";

if ($disabled) {
    $fileClasses .= ' opacity-60 cursor-not-allowed';
}

if ($hasError) {
    $fileClasses = str_replace('border-gray-300 dark:border-gray-600', 'border-red-300 dark:border-red-500', $fileClasses);
    $fileClasses = str_replace('focus:ring-indigo-500', 'focus:ring-red-500', $fileClasses);
}
@endphp

<div class="space-y-2">
    @if($label && $showLabel)
        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300" for="{{ $name }}">
            {{ $label }}
            @if($required)<span class="text-red-500 ml-1">*</span>@endif
        </label>
    @endif
    
    <input 
        class="{{ $fileClasses }}" 
        id="{{ $name }}" 
        name="{{ $name }}" 
        type="file"
        @if($accept) accept="{{ $accept }}" @endif
        @if($required) required @endif
        @if($multiple) multiple @endif
        @if($disabled) disabled @endif
        {{ $attributes }}
    />
    
    @error($name)
        <div class="text-red-500 text-sm mt-1 flex items-center">
            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
            </svg>
            {{ $message }}
        </div>
    @enderror
    
    @if($helpText && !$hasError)
        <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">
            {{ $helpText }} 
            @if($maxSize)
                <span class="font-semibold">(Max: {{ $maxSize }})</span>
            @endif
        </p>
    @endif
</div>