@props(['project'])

<a href="{{ route('projects.show', $project) }}" class="block relative group h-full rounded-xl overflow-hidden hover:scale-[0.97] transition-transform shadow">
    {{-- title --}}
    <div class="h-20 md:h-24 flex items-center justify-center text-white bg-gradient-to-br from-indigo-600 to-indigo-500 dark:from-indigo-800 dark:to-indigo-800">
        <p class="px-2 text-lg md:text-2xl">{{ Str::words($project->title, 4) }}</p>
    </div>

    <div class="p-3 flex flex-col gap-4 bg-white dark:bg-neutral-900">
        {{-- description --}}
        <p class="text-neutral-800 dark:text-neutral-100">{{ Str::words($project->description, 5) }}</p>
        {{-- progress bar --}}
        <div>
            <div class="flex justify-between mb-1">
                <span class="text-sm font-medium text-blue-700 dark:text-white">Completed Tasks</span>
                <span class="text-sm font-medium text-blue-700 dark:text-white">{{ $project->completedAvg() }}%</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-1.5 dark:bg-gray-700">
                <div class="bg-blue-600 h-1.5 rounded-full" style="width: {{ $project->completedAvg() }}%"></div>
            </div>
        </div>
        {{-- start date & users --}}
        <div class="flex items-center justify-between gap-2 text-sm text-neutral-600 dark:text-neutral-400">
            {{-- start date --}}
            <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                </svg>
                <p>{{ $project->start_date ?? 'No starting date' }}</p>
            </div>
            {{-- users count --}}
            <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                </svg>
                <p>{{ $project->usersCount() }}</p>
            </div>
        </div>
    </div>
</a>