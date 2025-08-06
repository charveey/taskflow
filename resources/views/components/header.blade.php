<header class="bg-white dark:bg-neutral-900 shadow-sm">
    <div class="flex py-2.5 px-2 sm:px-4">

        <h1 class="text-lg text-neutral-600 dark:text-neutral-200">
            {{ $header ?? '' }}
        </h1>

        {{-- theme --}}
        <x-theme-button style="ml-auto my-auto"/>


    </div>
</header>