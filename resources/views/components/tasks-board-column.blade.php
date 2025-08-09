@props(['title' => ''])

<div {{ $attributes->merge(['class'=> 'w-full flex flex-col gap-1.5 pb-1.5 rounded-lg shadow-inner bg-gray-100 dark:bg-neutral-800']) }}>
    <h3 class="font-medium text-center py-2.5">{{ $title }}</h3>
    {{ $slot }}
</div>