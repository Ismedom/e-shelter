
@props([
    'columns' => 2,
    'gap' => 6,
    'responsive' => true
])

@php
$gridClasses = "grid gap-{$gap}";

if ($responsive) {
    $gridClasses .= " grid-cols-1 md:grid-cols-{$columns}";
} else {
    $gridClasses .= " grid-cols-{$columns}";
}
@endphp

<div class="{{ $gridClasses }}">
    {{ $slot }}
</div>
