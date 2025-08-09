@props(['project'])

<div x-data="createTask()">

    <x-primary-button x-on:click.prevent="$dispatch('open-modal', 'create-task')">
        <div class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 block">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            <p>New Task</p>
        </div>
    </x-primary-button>

    <x-modal name="create-task" :show="false" focusable>
        <form @submit.prevent method="POST" class="p-6 dark:bg-neutral-900">
            @csrf

            <h2 class="md:text-lg">{{__('Create New Task')}}</h2>

            <div class="mt-6 space-y-4">
                {{-- title --}}
                <div>
                    <x-input-label value="{{__('Title')}}" :required="true" />
                    <x-text-input type="text" name="title" x-model="title" class="w-full max-w-2xl" />
                </div>

                {{-- description --}}
                <div>
                    <x-input-label value="{{__('Description')}}" />
                    <x-textarea-input name="description" x-model="description" class="w-full max-w-2xl" />
                </div>

                <div class="flex flex-col md:flex-row gap-6">
                    {{-- assign to --}}
                    <div class="w-full">
                        <x-input-label value="{{__('Assign To')}}" :required="true"/>
                        <x-select-box name="description" x-model="assign_to" class="w-full max-w-2xl cursor-pointer">
                            <option value="">
                                <p>Select User</p>
                            </option>
                            @foreach ($project->users as $user)
                                <option value="{{ $user->id }}">
                                    <p>{{ $user->name }}</p>
                                </option>
                            @endforeach
                        </x-select-box>
                    </div>
                    {{-- priority --}}
                    <div class="w-full">
                        <x-input-label value="{{__('Priority')}}" :required="true"/>
                        <x-select-box name="priority" x-model="priority" class="w-full max-w-2xl cursor-pointer">
                            <option value="">
                                <p class="text-gray-400 dark:text-gray-600">Select Priority</p>
                            </option>
                            <option value="low">
                                <p>Low</p>
                            </option>
                            <option value="medium">
                                <p>Medium</p>
                            </option>
                            <option value="high">
                                <p>High</p>
                            </option>
                        </x-select-box>
                    </div>
                </div>

                {{-- show errors --}}
                <div x-show="showErrors" x-transition class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <svg class="shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Danger</span>
                    <div>
                        <span class="font-medium">Ensure that these requirements are met:</span>
                        <ul class="mt-1.5 list-disc list-inside">
                            <template x-for="error in errors">
                                <li x-text="error"></li>
                            </template>
                        </ul>
                    </div>
                </div>

                {{-- buttons --}}
                <div class="flex gap-4 md:justify-end">
                    {{-- cancel --}}
                    <x-secondary-button class="w-32" x-on:click="$dispatch('close')" >
                        {{__('Cancel')}}
                    </x-secondary-button>
                    {{-- submit --}}
                    <x-primary-button class="w-32" x-on:click="submit()">
                        {{__('Submit')}}
                    </x-primary-button>
                </div>
            </div>
        </form>
    </x-modal>

    <script>
        function createTask() {
            return {
                errors: {},
                showErrors: false,
                title: '',
                description: '',
                assign_to: '',
                priority: '',
                submit() {
                    console.log(this.title, this.description, this.assign_to, this.priority)
                    axios.post(`/tasks/create?project={{$project->id}}&title=${this.title}&description=${this.description}&assign_to=${this.assign_to}&priority=${this.priority}`)
                    .then(res => {
                        console.log(res)
                        if(res.status == 200) {
                            {{-- window.location.reload(); --}}
                        }
                    })
                    .catch(errs => {
                        this.errors = errs.response.data.errors
                        this.showErrors = true
                        console.log(errs)
                    })
                }
            }
        }
    </script>
</div>