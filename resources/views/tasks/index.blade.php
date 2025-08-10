
<div class="flex">
    <!-- Navigation -->
    <x-navigation :project='$project'/>
    
    <x-app-layout>

        <div class="p-0 md:p-4 dark:text-gray-100">

            {{-- status --}}
            @if(session()->has('status'))
                <div class="flex items-center p-4 mb-4 mx-3 md:mx-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
                    <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">Success!</span> {{ session('status') }}
                    </div>
                </div>
            @endif
            {{-- error --}}
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="flex items-center p-4 mb-4 mx-3 md:mx-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
                        <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <span class="font-medium">Alert!</span> {{ $error }}
                        </div>
                    </div>
                @endforeach
            @endif

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
                <div class="ml-[56px] md:ml-0 mb-4">
                    <x-create-task :project="$project" />
                </div>
            @endif

            <x-tasks-table :tasks="$project->tasks" />

        </div>

    </x-app-layout>
</div>
