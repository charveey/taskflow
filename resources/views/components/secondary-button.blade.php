<button {{ $attributes->merge(['type' => 'button', 'class' => 'px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-1 disabled:opacity-25 transition ease-in-out duration-150 dark:text-neutral-50 dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:border-gray-600']) }}>
    {{ $slot }}
</button>
