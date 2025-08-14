@props(['project'])

<div class="w-full p-2.5 border border-gray-300 shadow-sm bg-white dark:border-none dark:bg-neutral-900 rounded-md">
    <div class="flex items-start gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
        <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
        </svg>
        <h3 class="font-semibold pb-2">Comments</h3>
        <p class="ml-auto">{{ $project->comments->count() }}</p>
    </div>
    <div class="lg:mt-2 flex flex-col gap-2">
        
        {{-- last comment --}}
        <div class="h-40 p-3 border rounded-xl dark:border-gray-700">
            {{-- user --}}
            @foreach($project->comments->take(1) as $comment)
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
            @endforeach
        </div>

        {{-- details --}}
        <a href="{{ route('comments.index', $project) }}" class="block col-span-2">
            <x-secondary-button class="w-full capitalize">
                <span>{{ $project->comments->count() > 1 ? '+'.($project->comments->count() - 1).' More Comments' : 'No Comments' }} </span>
            </x-secondary-button>
        </a>
    </div>
</div>