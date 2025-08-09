<div class="flex">
    <!-- Navigation -->
    <x-navigation :project='$project'/>
    
    <x-app-layout>
        {{-- header --}}
        <x-slot name="header">
            <div class="flex items-center">
                {{-- toggle nav --}}
                <x-toggle-nav style="mr-2 py-1.5"/>
                {{ __('Project Management') }}
            </div>
        </x-slot>
    
        <div class="dark:text-gray-200">
    
            <div class="w-full flex items-start gap-2 py-2 px-3 md:px-4 bg-indigo-600 dark:bg-indigo-800 text-white">
                <h2 class="text-xl md:text-2xl lg:text-4xl xl:text-5xl py-4 md:py-6 lg:py-9 font-semibold">{{ Str::words($project->title, 10) }}</h2>
            </div>
    
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-3 md:gap-5 p-3 md:p-4 text-sm">
                {{-- details --}}
                <x-project-details :project="$project" />
                
                {{-- users --}}
                <x-users-card :project="$project"/>
    
                {{-- tasks summary --}}
                <x-tasks-summary :project="$project" :tasks="$project->tasks"/>
            </div>
    </x-app-layout>
</div>