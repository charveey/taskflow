
<div class="flex">
    <!-- Navigation -->
    <x-navigation :project='$project'/>
    
    <x-app-layout>
        <div class="p-3 md:p-4">
        
            {{-- header --}}
            <x-slot name="header">
                <div class="flex items-center ml-[56px] md:ml-0">
                    {{-- toggle nav --}}
                    <x-toggle-nav style="mr-2 py-1.5"/>
                    {{ __('Tasks') }}
                </div>
            </x-slot>

            {{-- add task --}}
            @if (auth()->user()->getAuthority($project->id) == 'admin')
                <x-create-task :project="$project" />
            @endif

            <x-tasks-table :tasks="$project->tasks"/>

        </div>

    </x-app-layout>
</div>
