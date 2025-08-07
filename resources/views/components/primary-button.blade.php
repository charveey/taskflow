<button {{ $attributes->merge(['class' => 'px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white hover:text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-1 transition ease-in-out duration-150 dark:bg-blue-700 dark:text-white dark:hover:text-white dark:hover:bg-blue-800']) }}>
    {{ $slot }}
</button>
