@props(['tasks'])

<div x-data="" class="ml-[56px] md:ml-0 shadow-sm overflow-x-auto lg:rounded-xl dark:text-gray-100">

    <table class="md:w-full text-sm text-left rtl:text-right border-y text-gray-500 dark:text-gray-400 dark:border-y-gray-700">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-neutral-900 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-4 py-3">
                    title
                </th>
                <th scope="col" class="px-4 py-3">
                    description
                </th>
                <th scope="col" class="px-4 py-3">
                    status
                </th>
                <th scope="col" class="px-4 py-3">
                    priority
                </th>
                <th scope="col" class="px-4 py-3">
                    Assigned To
                </th>
                <th scope="col" class="px-4 py-3">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr class="bg-white border-b dark:bg-neutral-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700">
                    <th scope="row" class="flex items-center px-4 py-3 text-gray-900 whitespace-nowrap dark:text-white">
                        {{-- title --}}
                        <div class="ps-3">
                            <div class="text-base font-semibold">{{ $task->title }}</div>
                        </div>  
                    </th>
                    {{-- description --}}
                    <td class="max-w-52 px-4 py-3">
                        <div class="text-sm">{{ $task->description }}</div>
                    </td>
                    {{-- status --}}
                    <td class="px-4 py-3">
                        <div class="flex items-center capitalize">
                            {{ $task->status }} 
                        </div>
                    </td>
                    {{-- priority --}}
                    <td class="px-4 py-3">
                        <div class="flex items-center capitalize">
                            {{ $task->priority }} 
                        </div>
                    </td>
                    {{-- assigned to --}}
                    <td class="px-4 py-3">
                        <div class="flex items-center capitalize">
                            {{ $task->user->name }} 
                        </div>
                    </td>
                    {{-- remove task (if auth is admin) --}}
                    <td class="px-4 py-3">
                        @if( auth()->user()->getAuthority($task->project->id) == 'admin' )
                            <button x-on:click="$dispatch('open-modal', 'remove-task-{{$task->id}}')" class="font-medium text-red-600 dark:text-red-500 hover:underline">remove</button>
                        @else
                            <span>-</span>
                        @endif
                    </td>
                </tr>
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
            @endforeach
        </tbody>
    </table>

</div>