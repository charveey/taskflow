@props(['task'])

<div x-data="" class="text-neutral-900 dark:text-gray-100">
    <button x-on:click="$dispatch('open-modal', 'edit-task-{{$task->id}}')" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">edit</button>

    <x-modal name="edit-task-{{$task->id}}" :show="false" focusable maxWidth="lg">
        <form method="POST" action="{{ route('tasks.update', $task) }}" class="p-6 dark:bg-neutral-900">
            @csrf
            @method('put')

            <h2 class="md:text-lg">Edit Task <span class="text-sm ml-2 p-1 px-2 bg-gray-200 dark:bg-gray-700 rounded-md">{{ $task->title }}</span></h2>

            <div class="mt-6 space-y-4">
                {{-- title --}}
                <div>
                    <x-input-label value="{{__('Title')}}" :required="true" />
                    <x-text-input type="text" name="title" value="{{ $task->title }}" class="w-full max-w-2xl" />
                </div>

                {{-- description --}}
                <div>
                    <x-input-label value="{{__('Description')}}" />
                    <x-textarea-input name="description" class="w-full max-w-2xl">
                        {{ $task->description }}
                    </x-textarea-input>
                </div>

                <div class="flex flex-col md:flex-row gap-6">
                    {{-- assign to --}}
                    <div class="w-full">
                        <x-input-label value="{{__('Assign To')}}" :required="true"/>
                        <x-select-box name="assign_to" class="w-full max-w-2xl cursor-pointer">
                            <option value="">
                                <p>Select User</p>
                            </option>
                            @foreach ($task->project->users as $user)
                                <option value="{{ $user->id }}" @selected($task->user->id == $user->id)>
                                    <p>{{ $user->name }}</p>
                                </option>
                            @endforeach
                        </x-select-box>
                    </div>
                    {{-- priority --}}
                    <div class="w-full">
                        <x-input-label value="{{__('Priority')}}" :required="true"/>
                        <x-select-box name="priority" class="w-full max-w-2xl cursor-pointer">
                            <option value="">
                                <p class="text-gray-400 dark:text-gray-600">Select Priority</p>
                            </option>
                            <option value="low" @selected($task->priority == 'low')>
                                <p>Low</p>
                            </option>
                            <option value="medium" @selected($task->priority == 'medium')>
                                <p>Medium</p>
                            </option>
                            <option value="high" @selected($task->priority == 'high')>
                                <p>High</p>
                            </option>
                        </x-select-box>
                    </div>
                </div>

                {{-- buttons --}}
                <div class="flex gap-4 md:justify-end">
                    {{-- cancel --}}
                    <x-secondary-button class="w-32" x-on:click="$dispatch('close')" >
                        {{__('Cancel')}}
                    </x-secondary-button>
                    {{-- submit --}}
                    <x-primary-button class="w-32" type="submit">
                        {{__('Submit')}}
                    </x-primary-button>
                </div>
            </div>
        </form>
    </x-modal>
</div>

