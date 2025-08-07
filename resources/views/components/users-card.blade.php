@props(['project'])

<div class="p-2.5 border border-gray-300 shadow-sm bg-white dark:border-none dark:bg-neutral-900 rounded-md">
    
    <div class="flex items-start gap-3">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
        </svg>
        <h3 class="font-semibold">Users</h3>
        <p class="ml-auto mr-1.5">{{ $project->usersCount() }}</p>
    </div>
    
    {{-- users --}}
    <div class="pt-2 flex flex-col md:h-[90%]">

        @foreach($project->users() as $user)
            <div class="flex items-center px-2 py-1 text-gray-900 whitespace-nowrap dark:text-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-8 dark:text-gray-300">
                <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
                </svg>

                <div class="ps-3">
                    <div class="font-semibold -mb-1">{{ $user->name }}</div>
                    <div class="font-normal text-gray-500 dark:text-gray-400">{{ $user->email }}</div>
                </div>  
                <p class="ml-auto capitalize">{{ $user->authority }}</p>
            </div>
        @endforeach

        {{-- details --}}
        <x-secondary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'show-more-users')" class="mt-2 md:mt-auto">
            <span>{{ $project->usersCount() > 3 ? '' : 'show all users'}}</span>
        </x-secondary-button>
    </div>

    {{-- show more users --}}
    <x-modal name="show-more-users" :show="false" focusable maxWidth='xl'>
        <div class="p-4 lg:p-6 dark:bg-neutral-900">

            <div class="flex flex-wrap gap-2 items-center">
                <h2 class="md:text-lg">Users Working On Project</h2>
                <p class="p-1 px-2 bg-gray-200 rounded-md dark:bg-gray-700">{{ Str::words($project->title, 10) }}</p>
            </div>

            {{-- users --}}
            <div class="h-fit pt-2 flex flex-col">
                {{-- add user --}}
                <a href="/" class="block my-3">
                    <x-primary-button class="w-full">
                        Add User
                    </x-primary-button>
                </a>

                @foreach($project->users() as $user)
                    <div class="flex items-center px-2 py-1 text-gray-900 whitespace-nowrap dark:text-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-8 dark:text-gray-300">
                        <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
                        </svg>

                        <div class="ps-3">
                            <div class="font-semibold -mb-1">{{ $user->name }}</div>
                            <div class="font-normal text-gray-500 dark:text-gray-400">{{ $user->email }}</div>
                        </div>  
                        <p class="ml-auto capitalize">{{ $user->authority }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </x-modal>
</div>