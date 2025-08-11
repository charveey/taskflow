@props(['tasks'])

<div x-data="" class="ml-[56px] md:ml-0 shadow-sm overflow-x-auto lg:rounded-xl dark:text-gray-100">

    <table class="md:w-full text-sm text-left rtl:text-right border-y text-gray-500 dark:text-gray-400 dark:border-y-gray-700">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-neutral-900 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-4 py-3">
                    title
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
            @foreach($tasks->sortBy('created_at') as $task)
                <tr class="bg-white border-b dark:bg-neutral-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-neutral-700">
                    {{-- title --}}
                    <td scope="row" class="flex items-center px-4 py-3 text-gray-900 whitespace-nowrap dark:text-white">
                        <div class="ps-3">
                            <div class="text-base">{{ $task->title }}</div>
                        </div>  
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
                            <x-badge priority="{{ $task->priority }}" /> 
                        </div>
                    </td>
                    {{-- assigned to --}}
                    <td class="px-4 py-3">
                        <div class="flex items-center capitalize">
                            {{ $task->user->name }} 
                        </div>
                    </td>
                    {{-- actions (if auth is admin) --}}
                    <td class="px-4 py-3">
                        @if( auth()->user()->getAuthority($task->project->id) == 'admin' )
                            <div class="flex gap-2">
                                <x-remove-task :task="$task" />
                                <x-edit-task :task="$task" />
                            </div>
                        @else
                            <span>-</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>