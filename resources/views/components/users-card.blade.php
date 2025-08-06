@props(['project'])

<div class="p-2.5 border border-gray-300 shadow-sm bg-white dark:border-none dark:bg-neutral-700 rounded-md">
    
    <div class="flex items-start gap-3">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
        </svg>
        <h3 class="font-semibold">Users</h3>
        <p class="ml-auto mr-1.5">{{ $project->usersCount() }}</p>
    </div>
    
    {{-- users --}}
    <div class="pt-2">
        <div scope="row" class="flex items-center px-2 py-1 text-gray-900 whitespace-nowrap dark:text-gray-100">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-8 dark:text-gray-300">
            <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
            </svg>

            <div class="ps-3">
                <div class="font-semibold -mb-1">Neil Sims</div>
                <div class="font-normal text-gray-500 dark:text-gray-400">neil.sims@flowbite.com</div>
            </div>  
        </div>
        <div scope="row" class="flex items-center px-2 py-1 text-gray-900 whitespace-nowrap dark:text-gray-100">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-8 dark:text-gray-300">
            <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
            </svg>

            <div class="ps-3">
                <div class="font-semibold -mb-1">Muhammed Kusay</div>
                <div class="font-normal text-gray-500 dark:text-gray-400">kusay.sims@gmail.com</div>
            </div>  
        </div>
    </div>
</div>