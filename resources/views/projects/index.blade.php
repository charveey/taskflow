<x-app-layout>

    <x-slot name="header">
        {{__('Projects')}}
    </x-slot>

    <div class="p-3 md:p-4 dark:text-neutral-50">
        
        <x-create-project />

    </div>

</x-app-layout>