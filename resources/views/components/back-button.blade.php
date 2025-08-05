
<a href="{{ url()->previous() }}" 
    {{ $attributes->merge(['class' => 'w-fit group relative block p-1.5 rounded-full']) }}>
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
    </svg>
    <p class="absolute z-30 py-0.5 px-1 top-1/2 -translate-y-1/2 left-full ml-1 text-sm text-neutral-800 bg-gray-50 rounded-md hidden group-hover:block">back</p>
</a>