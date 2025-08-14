<div class="flex">
    <!-- Navigation -->
    <x-navigation :project='$project'/>
    
    <x-app-layout>

        <x-slot name="header">
            <div class="flex items-center ml-1 md:ml-0">
                {{-- toggle nav --}}
                <x-toggle-nav style="mr-2 py-1.5"/>
                {{ __('Comments') }}
            </div>
        </x-slot>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-3 md:gap-5 p-3 md:p-4 text-sm dark:text-gray-100">

            {{-- loop on comments --}}
            @foreach($project->comments as $comment)
                <div class="min-h-52 p-3 bg-white rounded-xl shadow-sm border border-gray-300 dark:bg-neutral-900 dark:border-gray-900">
                {{-- user --}}
                    <div class="flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-8 dark:text-gray-400">
                            <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
                        </svg>
                        <div class="font-semibold">{{ $comment->user->name }}</div>
                        {{-- created_at --}}
                        <span class="ml-auto">{{ $comment->created_at->format('Y M d') }}</span>
                    </div>
                    {{-- text --}}
                    <div class="mt-2">
                        <p>{{ Str::words($comment->content, 45) }}</p>
                    </div>
                </div>
            @endforeach

            {{-- create comment --}}
            <x-create-comment :project='$project' />

        </div>

    </x-app-layout>
</div>
