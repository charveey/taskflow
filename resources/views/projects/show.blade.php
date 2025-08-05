<x-app-layout>

    <x-slot name="header">
        {{ __('Project Management') }}
    </x-slot>

    <div class="dark:text-white">

        <div class="w-full flex items-start gap-2 py-2 px-3 md:px-4 bg-indigo-600 dark:bg-indigo-700 text-white">
            {{-- <x-back-button class="mx-2 bg-white text-indigo-600 "/> --}}

            <h2 class="text-xl md:text-2xl lg:text-4xl xl:text-5xl py-4 md:py-6 lg:py-9 font-semibold">{{ Str::words($project->title, 10) }}</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-3 md:gap-4 p-3 md:p-4 text-sm">
            {{-- dates & description --}}
            <div class="space-y-3 md:spcae-y-4">
                <div class="flex flex-col lg:flex-row gap-3">
                    <div class="w-full flex items-center gap-2 p-2.5 bg-gray-200 dark:bg-neutral-700 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                        </svg>
                        <p class="w-11/12">{{ $project->start_date ?? 'No Starting Date' }}</p>
                    </div>
                    <div class="w-full flex items-center gap-2 p-2.5 bg-gray-200 dark:bg-neutral-700 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                        </svg>
                        <p class="w-11/12">{{ $project->deadline ?? 'No Deadline' }}</p>
                    </div>
                </div>
                {{-- description --}}
                <div class="min-h-20 flex items-start gap-3 p-2.5 bg-gray-200 dark:bg-neutral-700 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                    </svg>
                    <div>
                        <h3 class="font-semibold pb-1">Description</h3>
                        <p class="w-11/12 text-gray-700 dark:text-gray-300">{{ $project->description }}</p>
                    </div>
                </div>
            </div>
            {{-- users --}}
            <x-users-card :project="$project"/>

        </div>
    </div>

</x-app-layout>