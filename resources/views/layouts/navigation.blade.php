<nav class="w-64 h-full">
    <!-- Primary Navigation Menu -->
    <div id="navigation-links" class="h-full fixed top-0 mx-auto p-2.5 sm:p-3 bg-white border-r border-r-neutral-200 dark:border-r-neutral-800 dark:bg-neutral-900 dark:border-neutral-800">
        <div class="h-full flex flex-col gap-6 justify-start">
            <!-- Logo -->
            <div id="nav-logo" class="mx-auto my-5">
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="block h-9 w-auto fill-current" />
                </a>
            </div>
            
            <!-- Navigation Links -->
            <div class="flex flex-col gap-2.5">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                    </svg>
                    <span class="sm:inline">{{ __('Dashboard') }}</span>
                </x-nav-link>
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('/')">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                    </svg>
                    <span class="sm:inline">{{ __('Projects') }}</span>
                </x-nav-link>
            </div>

            {{-- profile info --}}
            <div  id="profile-dropdown">
                <x-dropdown align="bottom" width="48">
                    <x-slot name="trigger">
                        <button>
                            {{ Auth::user()->name }}
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link href="{{ route('profile.edit') }}">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                    </x-slot>
                </x-dropdown>
            </div>

        </div>
    </div>

</nav>
