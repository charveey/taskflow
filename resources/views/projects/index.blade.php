<x-projects-page>

    <x-slot name="header">
        {{__('Projects')}}
    </x-slot>

    <div class="p-3 md:p-4 grid gap-3 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 dark:text-neutral-50">

        {{-- projects --}}
        @foreach (auth()->user()->projects() as $project)
            <x-project-card :project='$project'/>
        @endforeach 

        {{-- create project --}}
        <x-create-project />

        {{-- profile info --}}
        <div id="profile-dropdown" width="48" class="w-full lg:w-48 fixed left-0 lg:left-2 top-[92%] bg-gray-200 lg:rounded-lg dark:bg-neutral-700">
            <x-dropdown class="w-full">
                {{-- open menu --}}
                <x-slot name="trigger">
                    <button class="w-full flex gap-2 items-center hover:bg-gray-300 p-2 rounded-lg dark:text-gray-50 dark:hover:bg-neutral-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        <span>{{ Auth::user()->name }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 ml-auto">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </x-slot>
                {{-- content --}}
                <x-slot name="content">
                    {{-- show profile --}}
                    <x-dropdown-link href="{{ route('profile.edit') }}">
                        {{ __('Profile') }}
                    </x-dropdown-link>
                    {{-- show logout --}}
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        
                        <button type="submit" class="w-full">
                            <x-dropdown-link class="text-red-600 hover:text-red-700 dark:text-red-500 dark:hover:text-red-600">
                            {{ __('Logout') }}
                            </x-dropdown-link>
                        </button>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
    </div>

</x-projects-page>