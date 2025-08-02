<nav class="h-full">
    <!-- Primary Navigation Menu -->
    <div id="navigation-links" class="h-full fixed top-0 mx-auto p-2.5 sm:p-3 bg-white border-r border-r-neutral-200 dark:border-r-neutral-800 dark:bg-neutral-900 dark:border-neutral-800">
        <div class="h-full flex flex-col gap-6 justify-start">
            <!-- Logo -->
            <div id="nav-logo" class="mx-auto my-5">
                <a href="{{ route('dashboard') }}">
                    <x-application-logo />
                </a>
            </div>
            
            <!-- Navigation Links -->
            <div class="flex flex-col gap-2.5">
                {{-- Dashboard --}}
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                    </svg>
                    <span class="sm:inline">{{ __('Dashboard') }}</span>
                </x-nav-link>
                {{-- projects --}}
                <x-nav-link :href="route('projects.index')" :active="request()->routeIs('projects.index')">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                    </svg>
                    <span class="sm:inline">{{ __('Projects') }}</span>
                </x-nav-link>
            </div>

            {{-- profile info --}}
            <div id="profile-dropdown" width="48" class="mt-auto">
                <x-dropdown class="w-full">
                    {{-- open menu --}}
                    <x-slot name="trigger">
                        <button class="w-full flex gap-2 items-center hover:bg-neutral-100 p-2 rounded-lg dark:text-neutral-50 dark:hover:bg-neutral-800">
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
    </div>

</nav>
