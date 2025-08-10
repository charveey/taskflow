@props(['task'])

<div x-data="">
    <button x-on:click="$dispatch('open-modal', 'remove-task-{{$task->id}}')" class="font-medium text-red-600 dark:text-red-500 hover:underline">remove</button>

    <x-modal name="remove-task-{{$task->id}}" :show="false" focusable maxWidth="sm">
        <div class="flex flex-col gap-2 p-4 md:p-6 dark:bg-neutral-900">
            <p>You are about to remove <b>{{ $task->title }}</b> task from <b>{{ $task->project->title }}</b></p>
            <form action="{{ route('tasks.destroy', ['project' => $task->project, 'task' => $task]) }}" method="POST">
                @csrf
                @method('delete')
                <div class="w-fit ml-auto">
                    <x-secondary-button x-on:click="$dispatch('close')" class="capitalize">
                        cancel
                    </x-secondary-button>
                    <x-danger-button class="capitalize">
                        remove
                    </x-danger-button>
                </div>
            </form>
        </div>
    </x-modal>
</div>