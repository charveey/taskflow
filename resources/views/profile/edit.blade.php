<x-app-layout>

    <x-slot name="header">
        <div class="flex gap-1">
            <x-back-button class="hover:text-white hover:bg-indigo-600 dark:hover:bg-indigo-800"/>
            {{ __('Profile') }}
        </div>
    </x-slot>

    <div class="py-12 px-3 sm:px-0">
        <div class="max-w-6xl mx-auto sm:px-4 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow rounded-lg dark:bg-neutral-900">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow rounded-lg dark:bg-neutral-900">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow rounded-lg dark:bg-neutral-900">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
