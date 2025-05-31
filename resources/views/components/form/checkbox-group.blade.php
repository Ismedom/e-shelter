
@props([
    'name',
    'label' => null,
    'options' => [],
    'columns' => 2,
    'helpText' => null,
    'required' => false,
    'showLabel' => true
])

@php
$hasError = $errors->has($name);
@endphp

<div class="space-y-2">
    @if($label && $showLabel)
        <fieldset>
            <legend class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                {{ $label }}
                @if($required)<span class="text-red-500 ml-1">*</span>@endif
            </legend>
        </fieldset>
    @endif
    
    <div class="grid grid-cols-1 sm:grid-cols-{{ $columns }} gap-3 mt-2">
        @foreach($options as $option)
            <div class="flex items-start gap-3">
                <input 
                    id="{{ $name }}_{{ $option['value'] }}" 
                    type="checkbox" 
                    name="{{ $option['name'] ?? $name.'[]' }}" 
                    value="{{ $option['value'] }}" 
                    {{ in_array($option['value'], old($name, [])) ? 'checked' : '' }}
                    class="w-4 h-4 rounded border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-indigo-600 focus:ring-2 focus:ring-indigo-500 transition-all duration-200"
                />
                <label for="{{ $name }}_{{ $option['value'] }}" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 cursor-pointer">
                    {{ $option['label'] }}
                </label>
            </div>
        @endforeach
    </div>
    
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