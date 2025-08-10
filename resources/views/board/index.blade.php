<div class="flex">
    <!-- Navigation -->
    <x-navigation :project='$project'/>
    
    <x-app-layout>


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
