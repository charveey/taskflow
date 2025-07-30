@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center gap-2 rounded-md items-center px-2 py-2 text-sm font-medium leading-5 bg-neutral-100 text-neutral-800 transition duration-150 ease-in-out dark:bg-neutral-800 dark:text-gray-300 dark:hover:text-gray-200 dark:border-gray-600 dark:focus:text-gray-400'
            : 'flex items-center gap-2 rounded-md items-center px-2 py-2 text-sm font-medium leading-5 hover:bg-neutral-100 text-neutral-500 hover:text-neutral-800 transition duration-150 ease-in-out dark:text-gray-500 dark:hover:text-gray-400 dark:hover:bg-neutral-800 dark:hover:border-gray-600 dark:focus:text-gray-400';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
