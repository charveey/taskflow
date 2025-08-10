@props(['project', 'tasks'])

<div class="w-full lg:max-w-5xl mt-5 p-4 flex flex-col md:flex-row gap-4 mx-auto bg-white min-h-[480px] shadow rounded-md dark:bg-neutral-900">
    {{-- todo --}}
    <x-tasks-board-column title="Todo">
        @foreach ($tasks->where('status', 'todo') as $task)
            <x-tasks-board-card :task="$task" />
        @endforeach
    </x-tasks-board-column>
    {{-- Progress --}}
    <x-tasks-board-column title="Progress">
        @foreach ($tasks->where('status', 'progress') as $task)
            <x-tasks-board-card :task="$task" />
        @endforeach
    </x-tasks-board-column>
    {{-- done --}}
    <x-tasks-board-column title="Done">
        @foreach ($tasks->where('status', 'done') as $task)
            <x-tasks-board-card :task="$task" />
        @endforeach
    </x-tasks-board-column>
</div>