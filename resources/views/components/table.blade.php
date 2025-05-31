@props([
    'tableClass' => 'w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400',
    'theadClass' => 'text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400',
    'tbodyClass' => 'bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600',
])

<div class="flex flex-col">
    <div class="-my-2">
        <div class="py-2 align-middle inline-block min-w-full">
            <div class="shadow overflow-hidden border-b border-b-gray-200 dark:border-b-gray-700 sm:rounded-lg">
                <table class="{{ $tableClass }}" style="table-layout: fixed; width: 100%;">
                    {{$colgroup??''}}
                    <thead class="{{ $theadClass }}">
                        {{ $header }}
                    </thead>
                    <tbody class="{{ $tbodyClass }}">
                        {{ $body }}
                    </tbody>
                </table>
            </div>
            
            @isset($pagination)
                <div class="mt-4">
                    {{ $pagination }}
                </div>
            @endisset
        </div>
    </div>
</div>