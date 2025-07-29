<header class="bg-white dark:bg-neutral-900">
    <div class="flex py-2.5 px-2 sm:px-4">

        {{-- toggle nav --}}
        <x-toggle-nav style="mr-2"/>

        <h1 class="text-lg font-semibold text-neutral-800 dark:text-neutral-200">
            {{ $header ?? '' }}
        </h1>

        {{-- theme --}}
        <x-theme-button style="ml-auto my-auto"/>


    </div>
</header>