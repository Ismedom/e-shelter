
@props([
    'name',
    'label' => null,
    'placeholder' => null,
    'required' => false,
    'value' => null,
    'rows' => 4,
    'helpText' => null,
    'disabled' => false,
    'resize' => true,
    'showLabel' => true
])

@php
$hasError = $errors->has($name);
$textareaClasses = "block w-full pl-3 pr-3 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200";

if (!$resize) {
    $textareaClasses .= ' resize-none';
}

if ($disabled) {
    $textareaClasses .= ' opacity-60 cursor-not-allowed';
}

if ($hasError) {
    $textareaClasses = str_replace('border-gray-300 dark:border-gray-600', 'border-red-300 dark:border-red-500', $textareaClasses);
    $textareaClasses = str_replace('focus:ring-indigo-500', 'focus:ring-red-500', $textareaClasses);
}
@endphp

<div class="space-y-2">
    @if($label && $showLabel)
        <label for="{{ $name }}" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
            {{ $label }}
            @if($required)<span class="text-red-500 ml-1">*</span>@endif
        </label>
    @endif
    
    <textarea 
        id="{{ $name }}" 
        name="{{ $name }}" 
        rows="{{ $rows }}" 
        placeholder="{{ $placeholder }}"
        @if($required) required @endif
        @if($disabled) disabled @endif
        class="{{ $textareaClasses }}"
        {{ $attributes }}
    >{{ old($name, $value) }}</textarea>
    
    @error($name)
        <div class="text-red-500 text-sm mt-1 flex items-center">
            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
            </svg>
            {{ $message }}
        </div>
    @enderror
    
    @if($helpText && !$hasError)
        <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">{{ $helpText }}</p>
    @endif
</div>