<div class="w-full p-2.5 border border-gray-300 shadow-sm bg-white dark:border-none dark:bg-neutral-900 rounded-md">
    <div class="flex items-start gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
        </svg>
        <h3 class="font-semibold pb-2">Tasks</h3>
    </div>
    <div class="lg:mt-6 lg:h-4/5 grid grid-cols-1 md:grid-cols-2 gap-2">
        {{-- todo --}}
        <div class="flex gap-3 items-center bg-blue-50 text-blue-800 text-sm font-medium px-2.5 py-1 rounded-lg dark:bg-transparent dark:text-blue-300 border border-blue-300">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
            </svg>
            <span>todo</span>
            <p class="ml-auto">3</p>
        </div>
        {{-- process --}}
        <div class="flex gap-3 items-center bg-yellow-50 text-yellow-800 text-sm font-medium px-2.5 py-1 rounded-lg dark:bg-transparent dark:text-yellow-200 border border-yellow-200">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            <span>process</span>
            <p class="ml-auto">5</p>
        </div>
        {{-- done --}}
        <div class="flex gap-3 items-center bg-green-50 text-green-800 text-sm font-medium px-2.5 py-1 rounded-lg dark:bg-transparent dark:text-green-300 border border-green-300">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            <span>done</span>
            <p class="ml-auto">8</p>
        </div>
        {{-- canceled --}}
        <div class="flex gap-3 items-center bg-red-50 text-red-800 text-sm font-medium px-2.5 py-1 rounded-lg dark:bg-transparent dark:text-red-300 border border-red-300">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            <span>canceled</span>
            <p class="ml-auto">1</p>
        </div>
        {{-- details --}}
        <a href="/" class="block col-span-2">
            <x-secondary-button class="w-full capitalize">
                <span>more details</span>
            </x-secondary-button>
        </a>
    </div>
</div>