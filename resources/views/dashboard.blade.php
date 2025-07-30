<x-app-layout>

    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="py-12 min-h-[1000px]">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg dark:bg-neutral-900">
                <div class="p-6 text-gray-900 dark:text-neutral-50">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
