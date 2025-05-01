@props([
    'direction' => '',
    'label' => '',
    'data' => [
        ['value' => '', 'name' => ''],
    ],
    'value' => '',
])

<div class="{{ $direction === 'horizontal' ? 'flex gap-3 items-center' : '' }}">
    @if (!empty($label))
        <label for="small" class="text-sm font-medium text-gray-500 dark:text-gray-300 min-w-max">
            {{ $label }}
        </label>
    @endif

    <select 
        {{ $attributes->get('name')}}
        {{
            $attributes->twMerge(
                'block p-2 pr-8 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 cursor-pointer capitalize' .
                ($attributes->has('class') ? ' ' . $attributes->get('class') : '')
            )
        }}>
        @foreach ($data as $item)
            <option 
                value="{{ $item['value'] }}" 
                {{ $value === $item['value'] ? 'selected' : '' }}
                {{  $attributes->get('value') }}
            >
                {{ $item['name'] }}
            </option>
        @endforeach
    </select>
</div>