
@props([
    'name',
    'label',
    'value' => '1',
    'checked' => false,
    'helpText' => null,
    'disabled' => false,
    'showLabel' => true
])

@php
$hasError = $errors->has($name);
$checkboxClasses = "w-4 h-4 rounded border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-indigo-600 focus:ring-2 focus:ring-indigo-500 transition-all duration-200";

if ($disabled) {
    $checkboxClasses .= ' opacity-60 cursor-not-allowed';
}

if ($hasError) {
    $checkboxClasses = str_replace('border-gray-300 dark:border-gray-600', 'border-red-300 dark:border-red-500', $checkboxClasses);
    $checkboxClasses = str_replace('focus:ring-indigo-500', 'focus:ring-red-500', $checkboxClasses);
}
@endphp

<div class="space-y-2">
    <div class="flex items-start gap-3">
        <input 
            id="{{ $name }}" 
            type="checkbox" 
            name="{{ $name }}" 
            value="{{ $value }}" 
            {{ old($name, $checked) ? 'checked' : '' }}
            @if($disabled) disabled @endif
            class="{{ $checkboxClasses }}"
            {{ $attributes }}
        />
        <div class="flex-1 min-w-0">
            @if($showLabel)
                <label for="{{ $name }}" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 cursor-pointer">
                    {{ $label }}
                </label>
            @endif
            
            @if($helpText && !$hasError)
                <p class="mt-1 text-gray-500 dark:text-gray-400 text-sm">{{ $helpText }}</p>
            @endif
        </div>
    </div>
    
    @error($name)
        <div class="text-red-500 text-sm mt-1 flex items-center">
            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
            </svg>
            {{ $message }}
        </div>
    @enderror
</div>