@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm dark:bg-neutral-800 dark:border-gray-700 dark:focus:border-indigo-500 dark:focus:ring-indigo-500 dark:text-neutral-50']) }}>
