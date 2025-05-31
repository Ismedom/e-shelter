
<div class="relative max-w-sm flex h-12">
    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
       <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
        </svg>
    </div>
    <input
        {{ $attributes->twMerge('bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 px-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 '. $attributes->get('class')) }}
        {{ $attributes->except('class')->merge()}}
        id="{{ $attributes->get('id', 'datepicker-' . uniqid()) }}" 
        autocomplete="off" 
        datepicker 
        datepicker-buttons 
        datepicker-autoselect-today 
        type="text"
        >
</div>

<style>
@keyframes float {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-2px);
    }
}

input[datepicker]:focus + .absolute svg {
    animation: float 1.5s ease-in-out infinite;
}

.datepicker {
    animation: slideDown 0.25s ease-out;
    transform-origin: top center;
}

@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-8px) scale(0.98);
    }
    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

.datepicker-loading::after {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(59, 130, 246, 0.3), transparent);
    animation: shimmer 1.5s infinite;
}

@keyframes shimmer {
    0% {
        left: -100%;
    }
    100% {
        left: 100%;
    }
}
</style>
