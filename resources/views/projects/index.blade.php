<x-app-layout>

    <x-slot name="header">
        {{__('Projects')}}
    </x-slot>

    <div class="p-3 md:p-4 grid gap-3 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 dark:text-neutral-50">

        {{-- projects --}}
        @foreach (auth()->user()->projects() as $project)
            <x-project-card :project='$project'/>
        @endforeach 

        {{-- create project --}}
        <x-create-project />

    </div>

</x-app-layout>