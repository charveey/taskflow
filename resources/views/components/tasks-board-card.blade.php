@props(['task'])

<div {{ $attributes->merge(['class'=> 'bg-white dark:bg-neutral-900 mx-1.5 p-2 rounded-md border border-gray-200 shadow dark:bg-neutral-900/80 dark:border-neutral-700']) }}>
    <p class="mb-1">{{ $task->title }}</p>
    <div class="flex items-center justify-between text-gray-900 whitespace-nowrap dark:text-gray-100">
        {{-- avatar & name --}}
        <div class="flex items-center justify-between">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 dark:text-gray-400">
            <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
            </svg>
            <p class="ps-1 font-semibold text-sm">{{ Str::words($task->user->name, 2) }}</p>
        </div>  
        <x-badge :priority="$task->priority" />
    </div>
</div>