<div>
    {{-- title and priority --}}
    <div class="flex justify-between items-center">
        <h2 x-text="selectedTask.title" class="text-lg font-medium"></h2>
        <span
            :class="{
                'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300': selectedTask.priority === 'low',
                'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300': selectedTask.priority === 'medium',
                'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300': selectedTask.priority === 'high'
            }"
            class="text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm"
            x-text="selectedTask.priority"
            >
        </span>
    </div>
    {{-- description --}}
    <div>
        <h3 class="mt-3 mb-1 text-sm font-medium">Description</h3>
        <p x-text="selectedTask.description ?? 'No Description'" class="text-sm p-2 rounded-md bg-gray-50 border shadow-sm dark:border-gray-700 dark:bg-neutral-800"></p>
    </div>
    {{-- assigned_to and status --}}
    <div class="mt-4 flex items-center gap-4">
        <div class="w-full">
            <p class="mb-1 text-sm font-medium">Status</p>
            <div class="flex items-center gap-2 p-2 rounded-md bg-gray-50 border shadow-sm dark:border-gray-700 dark:bg-neutral-800">
                {{-- svg for status --}}
                <svg x-show="selectedTask.status === 'todo'" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-blue-600">
                <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                </svg>
                <svg x-show="selectedTask.status === 'progress'" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-yellow-500">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <svg x-show="selectedTask.status === 'done'" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-green-600">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <p x-text="selectedTask.status" class="capitalize text-sm"></p>
            </div>
        </div>
        <div class="w-full">
            <p class="mb-1 text-sm font-medium">Assigned To</p>
            <div class="flex items-center gap-2 p-2 rounded-md bg-gray-50 border shadow-sm dark:border-gray-700 dark:bg-neutral-800">
                {{-- avatar --}}
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 dark:text-gray-400">
                <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
                </svg>
                <p x-text="selectedTask.user.name" class="capitalize text-sm"></p>
            </div>
        </div>
    </div>
    {{-- created_at and done_at --}}
    <div class="mt-4 flex items-center gap-4">
        <div class="w-full">
            <p class="mb-1 text-sm font-medium">Created At</p>
            <div class="flex items-center gap-2 p-2 rounded-md bg-gray-50 border shadow-sm dark:border-gray-700 dark:bg-neutral-800">
                {{-- svg --}}
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                </svg>
                <p x-text="selectedTask.created_at.split('T')[0]" class="capitalize text-sm"></p>
            </div>
        </div>
        <div class="w-full">
            <p class="mb-1 text-sm font-medium">Done At</p>
            <div class="flex items-center gap-2 p-2 rounded-md bg-gray-50 border shadow-sm dark:border-gray-700 dark:bg-neutral-800">
                {{-- svg --}}
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                </svg>
                <p x-text="selectedTask.done_at ?? 'Not Done Yet'" class="capitalize text-sm"></p>
            </div>
        </div>
    </div>
</div>