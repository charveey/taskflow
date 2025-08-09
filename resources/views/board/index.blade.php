<div class="flex">
    <!-- Navigation -->
    <x-navigation :project='$project'/>
    
    <x-app-layout>
        {{-- project title --}}
        <div class="w-full flex items-start gap-2 px-3 md:px-4 bg-indigo-600 dark:bg-indigo-800 text-white">
            <h2 class="text-xl lg:text-2xl py-2 lg:py-4 font-semibold">{{ Str::words($project->title, 10) }}</h2>
        </div>

        <div class="p-3 md:p-4 dark:text-gray-100">
        
            {{-- header --}}
            <x-slot name="header">
                <div class="flex items-center ml-[56px] md:ml-0">
                    {{-- toggle nav --}}
                    <x-toggle-nav style="mr-2 py-1.5"/>
                    {{ __('Board') }}
                </div>
            </x-slot>

            <x-tasks-board :project="$project" :tasks="$project->tasks"/>

        </div>

    </x-app-layout>
</div>
